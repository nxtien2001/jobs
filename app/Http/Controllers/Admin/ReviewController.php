<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Review\AddReviewRequest;
use App\Http\Requests\Review\EditReviewRequest;
use App\Models\Review;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(Request $request)
    {
        $search = $request['keyword'] ?? "";
        if ($search != "") {
            $review = Review::where('name', 'like', "%" . $request->keyword . "%")->paginate(30);
        } else {
            $review = Review::orderBy('id', 'DESC')->get();
        }
        return view('admin.review.index', compact('review'));
    }
    public function create()
    {
        return view('admin.review.create');
    }
    public function store(AddReviewRequest $request)
    {
        $model = new Review();
        $model->fill($request->all());
        if ($request->hasFile('avatar')) {
            $name = uniqid() . '-' . $request->file('avatar')->getClientOriginalName();
            $request->file('avatar')->storeAs(
                'public\images\reviews',
                $name
            );
            $model['avatar'] = 'images/reviews/' . $name;
        }
        $model->save();
        return redirect()->route('review.index')->with('message', 'Thêm dữ liệu thành công!');
    }
    public function edit($id)
    {
        $review = Review::find($id);
        return view('admin.review.edit', compact('review'));
    }
    public function update(EditReviewRequest $request, $id)
    {
        $review = Review::find($id);
        if ($request->hasFile('avatar')) {
            if (File::exists('storage/' . $review->avatar)) {
                File::delete('storage/' . $review->avatar);
            }
        }
        $review->fill($request->all());
        if ($request->hasFile('avatar')) {
            $newFileName = uniqid() . '-' . $request->avatar->getClientOriginalName();
            $path = $request->avatar->storeAs('public/images/reviews', $newFileName);
            $review->avatar = str_replace('public/', '', $path);
        }
        $review->save();
        return redirect()->route('review.index')->with('alert', 'Cập nhật dữ liệu thành công!');
    }
    public function delete($id)
    {
        $review = Review::findOrFail($id);
        if (File::exists('storage/' . $review->avatar)) {
            File::delete('storage/' . $review->avatar);
        }
        $review->delete();
        return redirect()->route('review.index')->with('message', 'Xóa dữ liệu thành công!');
    }
}
