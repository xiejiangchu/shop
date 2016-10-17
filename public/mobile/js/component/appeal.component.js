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
var AppealComponent = (function () {
    function AppealComponent(window) {
        this.show_help = false;
        this.show_recorder = false;
        this.list = [];
        this.pictures = [];
        this.file_path = "http";
        this.window = window;
    }
    AppealComponent.prototype.ngOnInit = function () {
    };
    AppealComponent.prototype.ngOnDestroy = function () {
    };
    AppealComponent.prototype.recorder = function () {
        this.show_recorder = true;
    };
    AppealComponent.prototype.help = function () {
        this.show_help = true;
    };
    AppealComponent.prototype.house_selected = function (event) {
        console.log(JSON.stringify(event.data));
        this.list = event.data;
    };
    AppealComponent.prototype.voice_selected = function (event) {
        console.log(JSON.stringify(event.data));
    };
    AppealComponent.prototype.recorder_in_fy = function () {
        this.show_recorder = false;
        this.window.recorder_in_fy();
    };
    AppealComponent.prototype.recorder_in_ky = function () {
        this.show_recorder = false;
        this.window.recorder_in_ky();
    };
    AppealComponent.prototype.upload = function () {
    };
    __decorate([
        core_1.HostListener('window:recorder_in_fy', ['$event']), 
        __metadata('design:type', Function), 
        __metadata('design:paramtypes', [Object]), 
        __metadata('design:returntype', void 0)
    ], AppealComponent.prototype, "house_selected", null);
    __decorate([
        core_1.HostListener('window:recorder_in_ky', ['$event']), 
        __metadata('design:type', Function), 
        __metadata('design:paramtypes', [Object]), 
        __metadata('design:returntype', void 0)
    ], AppealComponent.prototype, "voice_selected", null);
    AppealComponent = __decorate([
        core_1.Component({
            selector: 'appeal',
            templateUrl: 'template/appeal.html',
        }),
        __param(0, core_1.Inject('Window')), 
        __metadata('design:paramtypes', [Window])
    ], AppealComponent);
    return AppealComponent;
}());
exports.AppealComponent = AppealComponent;
