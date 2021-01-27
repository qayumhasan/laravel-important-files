  public function itemStoreList()
    {
       $itemIssues = ItemIssue::where('is_active',1)->where('is_deleted',0)->get();
       $itemIssues = $itemIssues->groupBy(['issue_date',function($item){
           return $item['issued_by'];
       }], $preserveKeys = true);
       return $itemIssues = $itemIssues->all();
       return view('housekipping.items.item_issue_list',compact('itemIssues'));


    }
    
    
    
    //result comes with issue_date and issue_by here issue date is 27/12/2021 and issued_by id no 1
    
    
    {
  "20/01/2021": {
    "1": [
      {
        "id": 1,
        "order_id": "523",
        "issue_date": "20/01/2021",
        "room_id": "2",
        "item_id": "5",
        "qty": "10",
        "unit_id": "1",
        "issued_by": "1",
        "issued_date": "2021-01-27 10:54:56.077",
        "remarks": null,
        "date": null,
        "is_active": "1",
        "entry_by": null,
        "entry_date": null,
        "updated_by": null,
        "updated_date": null,
        "is_approve": "0",
        "approve_by": null,
        "approve_date": null,
        "is_deleted": "0",
        "created_at": null,
        "updated_at": null
      },
    
    
