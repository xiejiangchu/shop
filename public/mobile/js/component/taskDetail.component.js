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
var httpService_1 = require("../service/httpService");
var TaskDetailComponent = (function () {
    function TaskDetailComponent(httpService) {
        this.httpService = httpService;
    }
    TaskDetailComponent.prototype.ngOnInit = function () {
        var _this = this;
        this.httpService.getUrls()
            .then(function (list) { return _this.urls = list.slice(1, 5); });
    };
    TaskDetailComponent.prototype.ngOnDestroy = function () {
    };
    TaskDetailComponent = __decorate([
        core_1.Component({
            selector: 'task-detail',
            templateUrl: 'template/taskDetail.html',
            providers: [httpService_1.HttpService]
        }), 
        __metadata('design:paramtypes', [httpService_1.HttpService])
    ], TaskDetailComponent);
    return TaskDetailComponent;
}());
exports.TaskDetailComponent = TaskDetailComponent;
