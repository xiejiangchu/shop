"use strict";
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};
var core_1 = require('@angular/core');
var ServiceUrl = (function () {
    function ServiceUrl(url, name) {
        this.url = url;
        this.name = name;
    }
    return ServiceUrl;
}());
exports.ServiceUrl = ServiceUrl;
var Urls = [
    { url: '11', name: 'Mr. Nice' },
    { url: '12', name: 'Narco' },
    { url: '13', name: 'Bombasto' },
    { url: '14', name: 'Celeritas' },
    { url: '15', name: 'Magneta' },
    { url: '16', name: 'RubberMan' },
    { url: '17', name: 'Dynama' },
    { url: '18', name: 'Dr IQ' },
    { url: '19', name: 'Magma' },
    { url: '20', name: 'Tornado' }
];
var urls = Promise.resolve(Urls);
var HttpService = (function () {
    function HttpService() {
    }
    HttpService.prototype.getUrls = function () { return urls; };
    HttpService.prototype.getUrl = function (name) {
        return urls
            .then(function (heroes) { return heroes.find(function (hero) { return hero.url == name; }); });
    };
    HttpService = __decorate([
        core_1.Injectable(), 
        __metadata('design:paramtypes', [])
    ], HttpService);
    return HttpService;
}());
exports.HttpService = HttpService;
