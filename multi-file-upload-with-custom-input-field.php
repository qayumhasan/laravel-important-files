//In controller 
   if(count($data) >0){
                        if($request->hasfile('linkfile'))
                        {
                            foreach($request->file('linkfile') as $key=>$file)
                            {
                                $softID = $data[$key];
                                $dataupdate=ProductSoftWareLink::where('id',$softID)->first();
                                $name = time().$softID.'.'.$file->getClientOriginalExtension();
                                $newfile =$file->move(public_path().'/uploads/', $name);
                                $dataupdate->software_link =$newfile;
                                $dataupdate->save();
                                array_push($item, $name);
                            }
                        }
                     }
// In Blade file

<input type="file" name="linkfile[]" />
