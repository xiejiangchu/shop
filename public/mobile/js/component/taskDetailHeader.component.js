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
var core_2 = require("@angular/core");
var TaskDetailHeaderComponent = (function () {
    function TaskDetailHeaderComponent() {
        this.type = 2;
        console.log(this.item);
    }
    TaskDetailHeaderComponent.prototype.ngOnInit = function () {
        this.type = 1;
    };
    TaskDetailHeaderComponent.prototype.ngOnDestroy = function () {
    };
    TaskDetailHeaderComponent.prototype.toggleTab = function (select) {
        this.type = select;
    };
    __decorate([
        core_2.Input(), 
        __metadata('design:type', Number)
    ], TaskDetailHeaderComponent.prototype, "position", void 0);
    __decorate([
        core_2.Input(), 
        __metadata('design:type', Object)
    ], TaskDetailHeaderComponent.prototype, "item", void 0);
    TaskDetailHeaderComponent = __decorate([
        core_1.Component({
            selector: 'task-detail-header',
            templateUrl: 'template/taskDetailHeader.html'
        }), 
        __metadata('design:paramtypes', [])
    ], TaskDetailHeaderComponent);
    return TaskDetailHeaderComponent;
}());
exports.TaskDetailHeaderComponent = TaskDetailHeaderComponent;
