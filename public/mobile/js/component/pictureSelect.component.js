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
var platform_browser_1 = require('@angular/platform-browser');
var PictureSelect = (function () {
    function PictureSelect(sanitizer, window) {
        this.sanitizer = sanitizer;
        this.pictures = [];
        this.window = window;
    }
    PictureSelect.prototype.ngOnInit = function () {
    };
    PictureSelect.prototype.ngOnDestroy = function () {
    };
    PictureSelect.prototype.selsct_picture = function () {
        this.window.selsct_picture();
    };
    PictureSelect.prototype.file_select = function () {
        for (var i = 0; i < this.contentRef.nativeElement.files.length; i++) {
            var add_file = this.contentRef.nativeElement.files[i];
            var add_style = this.sanitizer.bypassSecurityTrustStyle('background-image:url(' + window.URL.createObjectURL(add_file) + ");");
            this.pictures.push({
                'file': add_file,
                'add_style': add_style,
            });
        }
        this.contentRef.nativeElement.files = null;
    };
    PictureSelect.prototype.upload = function () {
    };
    __decorate([
        core_1.ViewChild('content'), 
        __metadata('design:type', core_1.ElementRef)
    ], PictureSelect.prototype, "contentRef", void 0);
    PictureSelect = __decorate([
        core_1.Component({
            selector: 'picture-select',
            templateUrl: 'template/pictureSelect.html',
        }),
        __param(1, core_1.Inject('Window')), 
        __metadata('design:paramtypes', [platform_browser_1.DomSanitizer, Window])
    ], PictureSelect);
    return PictureSelect;
}());
exports.PictureSelect = PictureSelect;
