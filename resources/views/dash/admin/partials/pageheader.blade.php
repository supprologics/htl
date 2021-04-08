<div class="nk-block-head nk-block-head-sm">
    <div class="nk-block-between">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title page-title">{{$header}}</h3>
            <div class="nk-block-des text-soft">
                @isset($subHeader)
                <p>{{$subHeader}}</p>
                @endisset
            </div>
        </div>
        @isset($button)
        <div class="nk-block-head-content">
            <div class="toggle-wrap nk-block-tools-toggle">
                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu">
                    <em class="icon ni ni-more-v"></em>
                </a>
                <div class="toggle-expand-content" data-content="pageMenu">
                    <ul class="nk-block-tools g-3">
                        <li class="nk-block-tools-opt">
                            <button type="button" id="{{isset($id)?$id:''}}" class="btn btn-primary">
                                <em class="icon ni {{$icon}}"></em>
                                <span>{{$button_text}}</span>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        @endisset

    </div>
</div>