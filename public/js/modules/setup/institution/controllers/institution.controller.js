'use strict';

export default class InstitutionController {
  constructor(Institution, Notification) {
    this.Institution  =  Institution;
    this.Notification =  Notification;
    this.limitOptions =  [10, 15, 20, 50, 100, 200, 500];
    this.selected     =  [];

    this.options = {
      rowSelection    : false,
      multiSelect     : true,
      autoSelect      : true,
      decapitate      : false,
      largeEditDialog : false,
      boundaryLinks   : false,
      limitSelect     : true,
      pageSelect      : true
    };

    this.query = {
      per_page : 10,
      page     : 1
    };
  }

  $onInit() {
    this.title = "Institutions Module";
    this.Institution.get(this.query, response =>  {
        console.log(response);
    });
  }
}
