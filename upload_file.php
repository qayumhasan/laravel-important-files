in controller 


$dir->other_document = $request->file('other_document')->store('public/uploads/');

in blade file
{{url('storage/app/'.$dir->joining_letter)}}
