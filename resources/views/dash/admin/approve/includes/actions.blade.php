<div class="tb-odr-btns d-none d-md-inline float-right">

    <ul class="nk-tb-actions gx-2">
        <li>
            <div class="drodown">
                <a href="#" class="btn btn-sm btn-icon btn-trigger dropdown-toggle" data-toggle="dropdown"
                    aria-expanded="false"><em class="icon ni ni-more-h"></em></a>
                <div class="dropdown-menu dropdown-menu-right" style="">
                    <ul class="link-list-opt no-bdr">
                        <li><a href="{{ route('lecturer.lesson',$model->id) }}"><em class="icon ni ni-eye"></em><span>View Lesson</span></a></li>
                    </ul>
                </div>
            </div>
        </li>
    </ul>
</div>


<form action="" method="POST" id="f-{{$model->id}}">
    @csrf
    @method('delete')
</form>