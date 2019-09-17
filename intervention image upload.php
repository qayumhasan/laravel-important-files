<?php

// insert data

$request->validate(
	[
		'title' => 'required',
		'stitle' => 'required',
		'text' => 'required',
		'image' => 'image',
	],
	[
		'title.required' => 'Title must not be empty!',
		'stitle.required' => 'Sub Title must not be empty!',
		'text.required' => 'Description must not be empty!',
	]

);

$about_id = About::insertGetId([
	'title' => $request->title,
	'stitle' => $request->stitle,
	'text' => $request->text,
	'created_at' => Carbon::now(),
]);

// Update system start

$about_id = $request->editabout_id;
About::findOrFail($about_id)->update([
	'title' => $request->title,
	'stitle' => $request->stitle,
	'text' => $request->text,
]);
// intervenation image upload update
if ($request->hasFile('image')) {
	if (About::findOrFail($about_id)->image != 'defaultaboutimg.jpg') {
		$link = base_path('public/back-end/images/about/') . About::findOrFail($about_id)->image;
		unlink($link);
	}
	$about_img = $request->file('image');
	$imagename = $about_id . '.' . $about_img->getClientOriginalExtension();
	Image::make($about_img)->resize(600, 400)->save(base_path('public/back-end/images/about/' . $imagename), 50);

	About::findOrFail($about_id)->update([
		'image' => $imagename,
	]);
}
?>