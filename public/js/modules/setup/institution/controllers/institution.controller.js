'use strict';

export default class InstitutionController {
  constructor(Institution) {
    this.title = 'Institution Title';
    console.log('Hello');
    Institution.get({}, function(response) {
      console.log(response);
    });
  }
}
