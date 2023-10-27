<?php

namespace App\Http\Controller;

use App\Model\Review;
use Core\Base\BaseController;
use Core\Http\Request;
use Core\Http\Response;
use Core\Session\Session;
use Core\Validator\Types\IntType;
use Core\Validator\Types\StringType;
use Core\Validator\Validator;

class ReviewController extends BaseController
{
    public function addReviewView(Request $request)
    {
        render('addreview', ['id' => $request->getRouteParam('id')]);
    }

    public function addReview(Request $request)
    {
        $validated = Validator::validate($request->getFormData(), [
            'review' => new StringType(required: true),
            'rating' => new IntType(required: true, shouldCast: true),
        ]);

        if ($validated->isError()) {
            render('addreview', ['id' => $request->getRouteParam('id')]);
        } else {
            $reviewData = $validated->data;
            $reviewData['anime_id'] = $request->getRouteParam('id');
            $reviewData['user_id'] = Session::$user->id;

            $rowCount = Review::create($reviewData);
            if ($rowCount == 0) {
                render('addreview', ['error' => 'Failed to add review']);
            } else {
                Session::setMessage('Review added successfully');
                redirect('anime/' . $request->getRouteParam('id'));
            }
        }
    }

    public function editReviewView(Request $request)
    {
        $reviewData = Review::findById($request->getRouteParam('id'));
        
        if ($reviewData->user_id != Session::$user->id) {
            Response::status(403);
            render('403');
        } else {
            render('editreview', ['review' => $reviewData]);
        }      
    }

    public function editReview(Request $request)
    {
        $validated = Validator::validate($request->getFormData(), [
            'review' => new StringType(required: true),
            'rating' => new IntType(required: true, shouldCast: true),
        ]);

        $oldReview = Review::findById($request->getRouteParam('id'));

        if ($validated->isError()) {
            render('editreview', ['review' => $oldReview]);
        } else {
            $updateReviewData = $validated->data;
            $updateReviewData['anime_id'] = $oldReview->anime_id;
            $updateReviewData['user_id'] = $oldReview->user_id;

            $rowCount = Review::update($request->getRouteParam('id'), $updateReviewData);
            if ($rowCount == 0) {
                render('addreview', ['error' => 'Failed to edit review']);
            } else {
                Session::setMessage('Review added successfully');
                redirect('anime/' . $oldReview->anime_id);
            }
        }
    }

    public function deleteReview(Request $request)
    {
        $id = (int)$request->getRouteParam('id');
        Review::remove($id);

        Session::setMessage('Review deleted successfully');
    }
}