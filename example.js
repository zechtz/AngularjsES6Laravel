'use strict';

export default class UserController {
  constructor(User) {
    this.User     =  User;
    this.query    =  {per_page: 10, page: 1};
    this.user     =  {};
    this.loadData =  this.loadData.bind(this);
  }

  $onInit() {
    this.title = "Users";
    //works fine, fetches data from the api
    this.User.get(this.query, response =>  {
      this.user = response.data;
    });
  }

  loadData() {
    //this.query  => Undefined
    //cannot read property get of Undefined
    this.User.get(this.query, response =>  {
      this.user = response.data;
    });
  }
}

UserController.$inject = ['User'];
