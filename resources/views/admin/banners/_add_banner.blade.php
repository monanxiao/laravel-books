<div class="modal fade" id="addBannerModal" tabindex="-1" aria-labelledby="addBannerModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addBannerModal">轮播图</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
           <form action="{{ route('admin.banner.store') }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
               {{ csrf_field() }}
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="recipient-name" class="col-form-label">标题:</label>
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                        </div>
                        <div class="form-group col-md-8">
                            <label for="recipient-name" class="col-form-label">跳转链接:</label>
                            <input type="text" class="form-control" name="link" value="{{ old('link') }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="recipient-name" class="col-form-label">图片:</label>
                            <div class="col-md-12">
                                <div class="fileinput fileinput-new" style="width: 100%;" data-provides="fileinput" id="uploadImageDiv">
                                    <div class="fileinput-new thumbnail" style="width: 100%; height: 150px;">
                                        <img src="/images/books_bg.jpg" alt="封面图" />
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail" style="width: 100%; max-height: 150px;">
                                    </div>
                                    <div>
                                        <span class="btn default btn-file">
                                        <span class="fileinput-new">选择图片</span>
                                        <span class="fileinput-exists">更改</span>
                                            <input type="file" name="uploadImage" id="uploadImage" />
                                        </span>
                                        <a href="#" class="btn default fileinput-exists" data-dismiss="fileinput">移除</a>
                                        <span>请选择1M以内图片</span>
                                    </div>
                                </div>
                                <div id="titleImageError" style="color: #a94442"></div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>
                    <button type="submit" class="btn btn-primary">提交</button>
                </div>
            </form>
        </div>
    </div>
</div>
