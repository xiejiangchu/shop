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
var __param = (this && this.__param) || function (paramIndex, decorator) {
    return function (target, key) { decorator(target, key, paramIndex); }
};
var core_1 = require('@angular/core');
var AppComponent = (function () {
    function AppComponent(window) {
        this.window = window;
    }
    AppComponent.prototype.session = function (event) {
        this.user = event.data;
    };
    AppComponent.prototype.ngOnInit = function () {
    };
    AppComponent.prototype.ngOnDestroy = function () {
    };
    AppComponent.prototype.click = function () {
        this.window.session();
    };
    __decorate([
        core_1.HostListener('window:session', ['$event']), 
        __metadata('design:type', Function), 
        __metadata('design:paramtypes', [Object]), 
        __metadata('design:returntype', void 0)
    ], AppComponent.prototype, "session", null);
    AppComponent = __decorate([
        core_1.Component({
            selector: 'app',
            template: '<router-outlet></router-outlet>'
        }),
        __param(0, core_1.Inject('Window')), 
        __metadata('design:paramtypes', [Window])
    ], AppComponent);
    return AppComponent;
}());
exports.AppComponent = AppComponent;
