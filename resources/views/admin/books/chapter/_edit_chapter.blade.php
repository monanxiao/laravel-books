<div class="modal fade" id="editChapterModal" tabindex="-1" aria-labelledby="editChapterModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editChapterModalLabel">编辑章节</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
           <form action="{{ route('admin.chapter.update', $rv) }}" method="POST" accept-charset="UTF-8" >
               {{ csrf_field() }}
               {{ method_field('PATCH') }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">书籍:</label>
                        <select name="book_id" class="form-control">
                            @foreach($books as $bv)
                                @if($rv->book_id == $bv->id)
                                    <option value="{{ $bv->id }}" selected>{{ $bv->name }}---作者：{{ $bv->author }}</option>
                                @else
                                    <option value="{{ $bv->id }}">{{ $bv->name }}---作者：{{ $bv->author }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">名称:</label>
                        <input type="text" class="form-control" name="name" value="{{ $rv->name }}">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">排序:</label>
                        <input type="text" class="form-control" name="serial_number" value="{{ $rv->serial_number }}">
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
