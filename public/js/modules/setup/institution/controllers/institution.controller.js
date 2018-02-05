'use strict';

export default class InstitutionController {
  constructor(Institution) {
    this.Institution  =  Institution;
  }

  $onInit() {
    this.institutions =  this.Institution.get({}, function(response) {
      return response.data;
    });
  }
}
