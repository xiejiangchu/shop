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
var platform_browser_1 = require('@angular/platform-browser');
var router_1 = require('@angular/router');
var app_component_1 = require('./component/app.component');
var taskContainer_component_1 = require("./component/taskContainer.component");
var task_component_1 = require("./component/task.component");
var taskDetail_component_1 = require("./component/taskDetail.component");
var taskDetailHeader_component_1 = require("./component/taskDetailHeader.component");
var taskDetailHouse_component_1 = require("./component/taskDetailHouse.component");
var taskDetailReason_component_1 = require("./component/taskDetailReason.component");
var taskDetailOperate_component_1 = require("./component/taskDetailOperate.component");
var taskDetailContent_component_1 = require("./component/taskDetailContent.component");
var appeal_component_1 = require("./component/appeal.component");
var AppModule = (function () {
    function AppModule() {
    }
    AppModule.prototype.ngOnInit = function () {
    };
    AppModule = __decorate([
        core_1.NgModule({
            imports: [platform_browser_1.BrowserModule, router_1.RouterModule.forRoot([
                    { path: '', component: taskContainer_component_1.TaskContainerComponent },
                    { path: 'detail/:id', component: taskDetail_component_1.TaskDetailComponent },
                    { path: 'appeal', component: appeal_component_1.AppealComponent },
                ])],
            declarations: [app_component_1.AppComponent, taskContainer_component_1.TaskContainerComponent, task_component_1.TaskComponent,
                taskDetail_component_1.TaskDetailComponent, taskDetailHeader_component_1.TaskDetailHeaderComponent, taskDetailHouse_component_1.TaskDetailHouseComponent,
                taskDetailReason_component_1.TaskDetailReasonComponent, taskDetailOperate_component_1.TaskDetailOperateComponent, taskDetailContent_component_1.TaskDetailContentComponent,
                appeal_component_1.AppealComponent
            ],
            bootstrap: [app_component_1.AppComponent]
        }), 
        __metadata('design:paramtypes', [])
    ], AppModule);
    return AppModule;
}());
exports.AppModule = AppModule;
