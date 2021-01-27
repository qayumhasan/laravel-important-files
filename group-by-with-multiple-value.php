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
        "issue_date": "20/01/2021",
        "issued_by": "1",
        "remarks": null
      },
      {
        "issue_date": "20/01/2021",
        "issued_by": "1",
        "remarks": null
      },
      {
        "issue_date": "20/01/2021",
        "issued_by": "1",
        "remarks": null
      },
      {
        "issue_date": "20/01/2021",
        "issued_by": "1",
        "remarks": null
      },
      {
        "issue_date": "20/01/2021",
        "issued_by": "1",
        "remarks": null
      },
      {
        "issue_date": "20/01/2021",
        "issued_by": "1",
        "remarks": null
      }
    ]
  },
    
