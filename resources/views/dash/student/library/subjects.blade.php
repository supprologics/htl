@extends('layouts.student',['title'=>'Section'])

@section('css')
    <style>
    </style>
@endsection
@section('content')


<div class="nk-content p-0">
    <div class="nk-content-inner">
        <div class="">
            <div class="">
                <div class="nk-fmg-body">
                    <div class="nk-fmg-body-content">
                        <div class="nk-block-head nk-block-head-sm">
                            <div class="nk-block-between position-relative">
                                <div class="nk-block-head-content">
                                    <h3 class="nk-block-title page-title">Library</h3>
                                </div>
                            </div>
                        </div>
                        <div class="nk-fmg-quick-list nk-block">
                            <div class="nk-block-head-xs">
                                <div class="nk-block-between g-2">
                                    <div class="nk-block-head-content">
                                        @if (isset($mysubjects))
                                            <h6 class="nk-block-title title">Enrolled Subjects</h6>
                                        @endif
                                        @if (isset($mysubjectfiles))
                                            @if ($mysubjectfiles->count() > 0)
                                                <h6 class="nk-block-title title">{{ $mysubjectfiles->first()->subject->name}} Subject Related Documents</h6>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div><!-- .nk-block-head -->
                            <div class="toggle-expand-content expanded" data-content="quick-access">
                                <div class="nk-files nk-files-view-grid">
                                    <div class="nk-files-list">

                                        <!-- subjects folders --> 
                                        @if (isset($mysubjects))
                                            @foreach ($mysubjects as $subject)
                                                <div class="nk-file-item nk-file">
                                                    <div class="nk-file-info">
                                                        <a href="{{ route('library.subjectfiles',$subject->id) }}" class="nk-file-link">
                                                            <div class="nk-file-title">
                                                                <div class="nk-file-icon">
                                                                    <span class="nk-file-icon-type">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 72 72">
                                                                            <g>
                                                                                <rect x="32" y="16" width="28" height="15" rx="2.5" ry="2.5" style="fill:#f29611" />
                                                                                <path d="M59.7778,61H12.2222A6.4215,6.4215,0,0,1,6,54.3962V17.6038A6.4215,6.4215,0,0,1,12.2222,11H30.6977a4.6714,4.6714,0,0,1,4.1128,2.5644L38,24H59.7778A5.91,5.91,0,0,1,66,30V54.3962A6.4215,6.4215,0,0,1,59.7778,61Z" style="fill:#ffb32c" />
                                                                                <path d="M8.015,59c2.169,2.3827,4.6976,2.0161,6.195,2H58.7806a6.2768,6.2768,0,0,0,5.2061-2Z" style="fill:#f2a222" />
                                                                            </g>
                                                                        </svg>
                                                                    </span>
                                                                </div>
                                                                <div class="nk-file-name">
                                                                    <div class="nk-file-name-text">
                                                                        <span href="{{ route('library.subjectfiles',$subject->id) }}" class="title">{{ $subject->name }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif

                                        
                                        <!-- subject documents /references -->
                                        @if (isset($mysubjectfiles))
                                            @foreach ($mysubjectfiles as $file)
                                                @php            
                                                    $ext = explode('.', trim($file->file_path))[1];
                                                @endphp
                                                <div class="nk-file-item nk-file">
                                                    <div class="nk-file-info">
                                                        <a href="{{ route('getfile',$file->id) }}" class="nk-file-link">
                                                            <div class="nk-file-title">
                                                                <div class="nk-file-icon">
                                                                    @if ($ext=='pdf' || $ext=='html')
                                                                        <span class="nk-file-icon-type">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 72 72">
                                                                            <path d="M50,61H22a6,6,0,0,1-6-6V22l9-11H50a6,6,0,0,1,6,6V55A6,6,0,0,1,50,61Z" style="fill:#f26b6b" />
                                                                            <path d="M25,20.556A1.444,1.444,0,0,1,23.556,22H16l9-11h0Z" style="fill:#f4c9c9" />
                                                                            <path d="M46.3342,44.5381a4.326,4.326,0,0,0-2.5278-1.4289,22.436,22.436,0,0,0-4.5619-.3828A19.3561,19.3561,0,0,1,35.82,37.9536a56.5075,56.5075,0,0,0,1.3745-6.0858,2.339,2.339,0,0,0-.4613-1.8444,1.9429,1.9429,0,0,0-1.5162-.753h-.0014a1.6846,1.6846,0,0,0-1.3893.6966c-1.1493,1.5257-.3638,5.219-.1941,5.9457a12.6118,12.6118,0,0,0,.7236,2.1477,33.3221,33.3221,0,0,1-2.49,6.1052,20.3467,20.3467,0,0,0-5.9787,3.4413,2.5681,2.5681,0,0,0-.8861,1.8265,1.8025,1.8025,0,0,0,.6345,1.3056,2.0613,2.0613,0,0,0,1.3942.5313,2.2436,2.2436,0,0,0,1.4592-.5459,20.0678,20.0678,0,0,0,4.2893-5.3578,20.8384,20.8384,0,0,1,5.939-1.1858A33.75,33.75,0,0,0,42.96,47.7858,2.6392,2.6392,0,0,0,46.376,47.55,2.08,2.08,0,0,0,46.3342,44.5381ZM27.6194,49.6234a.8344.8344,0,0,1-1.0847.0413.4208.4208,0,0,1-.1666-.2695c-.0018-.0657.0271-.3147.4408-.736a18.0382,18.0382,0,0,1,3.7608-2.368A17.26,17.26,0,0,1,27.6194,49.6234ZM34.9023,30.848a.343.343,0,0,1,.3144-.1514.6008.6008,0,0,1,.4649.2389.853.853,0,0,1,.1683.6722v0c-.1638.92-.4235,2.381-.8523,4.1168-.0125-.05-.0249-.1-.037-.1506C34.6053,34.0508,34.3523,31.5779,34.9023,30.848ZM33.7231,43.5507a34.9732,34.9732,0,0,0,1.52-3.7664,21.2484,21.2484,0,0,0,2.2242,3.05A21.8571,21.8571,0,0,0,33.7231,43.5507Zm11.7054,2.97a1.3085,1.3085,0,0,1-1.6943.0887,33.2027,33.2027,0,0,1-3.0038-2.43,20.9677,20.9677,0,0,1,2.8346.3335,2.97,2.97,0,0,1,1.7406.9647C45.8377,46.1115,45.6013,46.3483,45.4285,46.5212Z" style="fill:#fff" /></svg>
                                                                        </span>
                                                                    @elseif($ext=='jpeg' || $ext=='png' || $ext=='jpg' || $ext=='bmp' || $ext=='gif')

                                                                        <span class="nk-file-icon-type">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 72 72">
                                                                                <path d="M50,61H22a6,6,0,0,1-6-6V22l9-11H50a6,6,0,0,1,6,6V55A6,6,0,0,1,50,61Z" style="fill:#755de0" />
                                                                                <path d="M27.2223,43H44.7086s2.325-.2815.7357-1.897l-5.6034-5.4985s-1.5115-1.7913-3.3357.7933L33.56,40.4707a.6887.6887,0,0,1-1.0186.0486l-1.9-1.6393s-1.3291-1.5866-2.4758,0c-.6561.9079-2.0261,2.8489-2.0261,2.8489S25.4268,43,27.2223,43Z" style="fill:#fff" />
                                                                                <path d="M25,20.556A1.444,1.444,0,0,1,23.556,22H16l9-11h0Z" style="fill:#b5b3ff" /></svg>
                                                                        </span>

                                                                    @elseif($ext=='zip' || $ext=='rar')

                                                                        <span class="nk-file-icon-type">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 72 72">
                                                                                <g>
                                                                                    <rect x="16" y="14" width="40" height="44" rx="6" ry="6" style="fill:#7e95c4" />
                                                                                    <rect x="32" y="17" width="8" height="2" rx="1" ry="1" style="fill:#fff" />
                                                                                    <rect x="32" y="22" width="8" height="2" rx="1" ry="1" style="fill:#fff" />
                                                                                    <rect x="32" y="27" width="8" height="2" rx="1" ry="1" style="fill:#fff" />
                                                                                    <rect x="32" y="32" width="8" height="2" rx="1" ry="1" style="fill:#fff" />
                                                                                    <rect x="32" y="37" width="8" height="2" rx="1" ry="1" style="fill:#fff" />
                                                                                    <path d="M35,14h2a0,0,0,0,1,0,0V43a1,1,0,0,1-1,1h0a1,1,0,0,1-1-1V14A0,0,0,0,1,35,14Z" style="fill:#fff" />
                                                                                    <path d="M38.0024,42H33.9976A1.9976,1.9976,0,0,0,32,43.9976v2.0047A1.9976,1.9976,0,0,0,33.9976,48h4.0047A1.9976,1.9976,0,0,0,40,46.0024V43.9976A1.9976,1.9976,0,0,0,38.0024,42Zm-.0053,4H34V44h4Z" style="fill:#fff" />
                                                                                </g>
                                                                            </svg>
                                                                        </span>

                                                                    @elseif($ext=='xlsx' || $ext=='xlsm' || $ext=='xlsb' || $ext=='xltx' || $ext=='xltm' || $ext=='xls' || $ext=='xml'){ 
                                                                        <span class="nk-file-icon-type">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 72 72">
                                                                            <path d="M50,61H22a6,6,0,0,1-6-6V22l9-11H50a6,6,0,0,1,6,6V55A6,6,0,0,1,50,61Z" style="fill:#36c684" />
                                                                            <path d="M25,20.556A1.444,1.444,0,0,1,23.556,22H16l9-11h0Z" style="fill:#95e5bd" />
                                                                            <path d="M42,31H30a3.0033,3.0033,0,0,0-3,3V45a3.0033,3.0033,0,0,0,3,3H42a3.0033,3.0033,0,0,0,3-3V34A3.0033,3.0033,0,0,0,42,31ZM29,38h6v3H29Zm8,0h6v3H37Zm6-4v2H37V33h5A1.001,1.001,0,0,1,43,34ZM30,33h5v3H29V34A1.001,1.001,0,0,1,30,33ZM29,45V43h6v3H30A1.001,1.001,0,0,1,29,45Zm13,1H37V43h6v2A1.001,1.001,0,0,1,42,46Z" style="fill:#fff" /></svg>
                                                                    
                                                                        </span>
                                                                    @else
                                                                    <span class="nk-file-icon-type">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 72 72">
                                                                            <g>
                                                                                <path d="M50,61H22a6,6,0,0,1-6-6V22l9-11H50a6,6,0,0,1,6,6V55A6,6,0,0,1,50,61Z" style="fill:#599def" />
                                                                                <path d="M25,20.556A1.444,1.444,0,0,1,23.556,22H16l9-11h0Z" style="fill:#c2e1ff" />
                                                                                <rect x="27" y="31" width="18" height="2" rx="1" ry="1" style="fill:#fff" />
                                                                                <rect x="27" y="36" width="18" height="2" rx="1" ry="1" style="fill:#fff" />
                                                                                <rect x="27" y="41" width="18" height="2" rx="1" ry="1" style="fill:#fff" />
                                                                                <rect x="27" y="46" width="12" height="2" rx="1" ry="1" style="fill:#fff" />
                                                                            </g>
                                                                        </svg>
                                                                    </span>
                                                                    @endif
                                                                </div>
                                                                <div class="nk-file-name">
                                                                    <div class="nk-file-name-text">
                                                                        <span href="{{ route('getfile',$file->id) }}" class="title">{{ $file->name }}</span>
                                                                        <span href="{{ route('getfile',$file->id) }}" class="">{{ $file->types->name}}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="nk-file-actions">
                                                        <div class="dropdown">
                                                            <a href="" class="dropdown-toggle btn btn-sm btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li><a href="{{ route('getfile',$file->id) }}" ><em class="icon ni ni-download"></em><span>Download</span></a></li>
                                                                    @if ($ext=='pdf')
                                                                        <li><a onclick="pdf_view('{{$file->file_path}}')"  ><em class="icon ni ni-eye"></em><span>PDF Reader</span></a></li>
                                                                    @endif
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div><!-- .nk-files -->
                            </div>
                        </div>

                        
                        @if (isset($mysubjectsections))
                            @if ($mysubjectsections->count() > 0)
                            @foreach ($mysubjectsections as $section)
                                @if ($section->lessons->count() > 0)
                                @foreach ($section->lessons as $lesson)
                                    @if ($lesson->attachments->count() > 0)

                                        <div class="nk-fmg-quick-list nk-block">
                                            <div class="nk-block-head-xs">
                                                <div class="nk-block-between g-2">
                                                    <div class="nk-block-head-content">
                                                        <h6 class="nk-block-title title">{{ $lesson->name }} Attachments</h6>
                                                    </div>
                                                </div>
                                            </div><!-- .nk-block-head -->
                                            <div class="toggle-expand-content expanded" data-content="quick-access">
                                                <div class="nk-files nk-files-view-grid">
                                                    <div class="nk-files-list">
                                                        
                                                            @foreach ($lesson->attachments as $attach)
                                                                @php            
                                                                    $ext = explode('.', trim($attach->file_path))[1];
                                                                @endphp
                                                                <div class="nk-file-item nk-file">
                                                                    <div class="nk-file-info">
                                                                        <a href="{{ route('get.lessonattach',$attach->id) }}" class="nk-file-link">
                                                                            <div class="nk-file-title">
                                                                                <div class="nk-file-icon">
                                                                                    @if ($ext=='pdf' || $ext=='html')
                                                                                        <span class="nk-file-icon-type">
                                                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 72 72">
                                                                                            <path d="M50,61H22a6,6,0,0,1-6-6V22l9-11H50a6,6,0,0,1,6,6V55A6,6,0,0,1,50,61Z" style="fill:#f26b6b" />
                                                                                            <path d="M25,20.556A1.444,1.444,0,0,1,23.556,22H16l9-11h0Z" style="fill:#f4c9c9" />
                                                                                            <path d="M46.3342,44.5381a4.326,4.326,0,0,0-2.5278-1.4289,22.436,22.436,0,0,0-4.5619-.3828A19.3561,19.3561,0,0,1,35.82,37.9536a56.5075,56.5075,0,0,0,1.3745-6.0858,2.339,2.339,0,0,0-.4613-1.8444,1.9429,1.9429,0,0,0-1.5162-.753h-.0014a1.6846,1.6846,0,0,0-1.3893.6966c-1.1493,1.5257-.3638,5.219-.1941,5.9457a12.6118,12.6118,0,0,0,.7236,2.1477,33.3221,33.3221,0,0,1-2.49,6.1052,20.3467,20.3467,0,0,0-5.9787,3.4413,2.5681,2.5681,0,0,0-.8861,1.8265,1.8025,1.8025,0,0,0,.6345,1.3056,2.0613,2.0613,0,0,0,1.3942.5313,2.2436,2.2436,0,0,0,1.4592-.5459,20.0678,20.0678,0,0,0,4.2893-5.3578,20.8384,20.8384,0,0,1,5.939-1.1858A33.75,33.75,0,0,0,42.96,47.7858,2.6392,2.6392,0,0,0,46.376,47.55,2.08,2.08,0,0,0,46.3342,44.5381ZM27.6194,49.6234a.8344.8344,0,0,1-1.0847.0413.4208.4208,0,0,1-.1666-.2695c-.0018-.0657.0271-.3147.4408-.736a18.0382,18.0382,0,0,1,3.7608-2.368A17.26,17.26,0,0,1,27.6194,49.6234ZM34.9023,30.848a.343.343,0,0,1,.3144-.1514.6008.6008,0,0,1,.4649.2389.853.853,0,0,1,.1683.6722v0c-.1638.92-.4235,2.381-.8523,4.1168-.0125-.05-.0249-.1-.037-.1506C34.6053,34.0508,34.3523,31.5779,34.9023,30.848ZM33.7231,43.5507a34.9732,34.9732,0,0,0,1.52-3.7664,21.2484,21.2484,0,0,0,2.2242,3.05A21.8571,21.8571,0,0,0,33.7231,43.5507Zm11.7054,2.97a1.3085,1.3085,0,0,1-1.6943.0887,33.2027,33.2027,0,0,1-3.0038-2.43,20.9677,20.9677,0,0,1,2.8346.3335,2.97,2.97,0,0,1,1.7406.9647C45.8377,46.1115,45.6013,46.3483,45.4285,46.5212Z" style="fill:#fff" /></svg>
                                                                                        </span>
                                                                                    @elseif($ext=='jpeg' || $ext=='png' || $ext=='jpg' || $ext=='bmp' || $ext=='gif')
                
                                                                                        <span class="nk-file-icon-type">
                                                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 72 72">
                                                                                                <path d="M50,61H22a6,6,0,0,1-6-6V22l9-11H50a6,6,0,0,1,6,6V55A6,6,0,0,1,50,61Z" style="fill:#755de0" />
                                                                                                <path d="M27.2223,43H44.7086s2.325-.2815.7357-1.897l-5.6034-5.4985s-1.5115-1.7913-3.3357.7933L33.56,40.4707a.6887.6887,0,0,1-1.0186.0486l-1.9-1.6393s-1.3291-1.5866-2.4758,0c-.6561.9079-2.0261,2.8489-2.0261,2.8489S25.4268,43,27.2223,43Z" style="fill:#fff" />
                                                                                                <path d="M25,20.556A1.444,1.444,0,0,1,23.556,22H16l9-11h0Z" style="fill:#b5b3ff" /></svg>
                                                                                        </span>
                
                                                                                    @elseif($ext=='zip' || $ext=='rar')
                
                                                                                        <span class="nk-file-icon-type">
                                                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 72 72">
                                                                                                <g>
                                                                                                    <rect x="16" y="14" width="40" height="44" rx="6" ry="6" style="fill:#7e95c4" />
                                                                                                    <rect x="32" y="17" width="8" height="2" rx="1" ry="1" style="fill:#fff" />
                                                                                                    <rect x="32" y="22" width="8" height="2" rx="1" ry="1" style="fill:#fff" />
                                                                                                    <rect x="32" y="27" width="8" height="2" rx="1" ry="1" style="fill:#fff" />
                                                                                                    <rect x="32" y="32" width="8" height="2" rx="1" ry="1" style="fill:#fff" />
                                                                                                    <rect x="32" y="37" width="8" height="2" rx="1" ry="1" style="fill:#fff" />
                                                                                                    <path d="M35,14h2a0,0,0,0,1,0,0V43a1,1,0,0,1-1,1h0a1,1,0,0,1-1-1V14A0,0,0,0,1,35,14Z" style="fill:#fff" />
                                                                                                    <path d="M38.0024,42H33.9976A1.9976,1.9976,0,0,0,32,43.9976v2.0047A1.9976,1.9976,0,0,0,33.9976,48h4.0047A1.9976,1.9976,0,0,0,40,46.0024V43.9976A1.9976,1.9976,0,0,0,38.0024,42Zm-.0053,4H34V44h4Z" style="fill:#fff" />
                                                                                                </g>
                                                                                            </svg>
                                                                                        </span>
                
                                                                                    @elseif($ext=='xlsx' || $ext=='xlsm' || $ext=='xlsb' || $ext=='xltx' || $ext=='xltm' || $ext=='xls' || $ext=='xml'){ 
                                                                                        <span class="nk-file-icon-type">
                                                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 72 72">
                                                                                            <path d="M50,61H22a6,6,0,0,1-6-6V22l9-11H50a6,6,0,0,1,6,6V55A6,6,0,0,1,50,61Z" style="fill:#36c684" />
                                                                                            <path d="M25,20.556A1.444,1.444,0,0,1,23.556,22H16l9-11h0Z" style="fill:#95e5bd" />
                                                                                            <path d="M42,31H30a3.0033,3.0033,0,0,0-3,3V45a3.0033,3.0033,0,0,0,3,3H42a3.0033,3.0033,0,0,0,3-3V34A3.0033,3.0033,0,0,0,42,31ZM29,38h6v3H29Zm8,0h6v3H37Zm6-4v2H37V33h5A1.001,1.001,0,0,1,43,34ZM30,33h5v3H29V34A1.001,1.001,0,0,1,30,33ZM29,45V43h6v3H30A1.001,1.001,0,0,1,29,45Zm13,1H37V43h6v2A1.001,1.001,0,0,1,42,46Z" style="fill:#fff" /></svg>
                                                                                    
                                                                                        </span>
                                                                                    @else
                                                                                    <span class="nk-file-icon-type">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 72 72">
                                                                                            <g>
                                                                                                <path d="M50,61H22a6,6,0,0,1-6-6V22l9-11H50a6,6,0,0,1,6,6V55A6,6,0,0,1,50,61Z" style="fill:#599def" />
                                                                                                <path d="M25,20.556A1.444,1.444,0,0,1,23.556,22H16l9-11h0Z" style="fill:#c2e1ff" />
                                                                                                <rect x="27" y="31" width="18" height="2" rx="1" ry="1" style="fill:#fff" />
                                                                                                <rect x="27" y="36" width="18" height="2" rx="1" ry="1" style="fill:#fff" />
                                                                                                <rect x="27" y="41" width="18" height="2" rx="1" ry="1" style="fill:#fff" />
                                                                                                <rect x="27" y="46" width="12" height="2" rx="1" ry="1" style="fill:#fff" />
                                                                                            </g>
                                                                                        </svg>
                                                                                    </span>
                                                                                    @endif
                                                                                </div>
                                                                                <div class="nk-file-name">
                                                                                    <div class="nk-file-name-text">
                                                                                        <span href="{{ route('get.lessonattach',$attach->id) }}" class="title">{{ $attach->name }}</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                    <div class="nk-file-actions">
                                                                        <div class="dropdown">
                                                                            <a href="" class="dropdown-toggle btn btn-sm btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                                <ul class="link-list-opt no-bdr">
                                                                                    <li><a href="{{ route('get.lessonattach',$attach->id) }}" ><em class="icon ni ni-download"></em><span>Download</span></a></li>
                                                                                    @if ($ext=='pdf')
                                                                                        <li><a onclick="pdf_view('{{$attach->file_path}}')" ><em class="icon ni ni-eye"></em><span>PDF Reader</span></a></li>
                                                                                    @endif
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                    </div>
                                                </div><!-- .nk-files -->
                                            </div>
                                        </div>
                                        
                                    @endif
                                @endforeach
                                @endif                                                                                          
                            @endforeach
                            @endif
                        @endif

                        
                    </div><!-- .nk-fmg-body-content -->
                </div><!-- .nk-fmg-body -->
            </div><!-- .nk-fmg -->
        </div>
    </div>
</div>


<div class="modal fade" tabindex="-1" role="dialog" id="pdf-viewer">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-md">
                <embed src="" id="pdf-src" type="application/pdf" width="100%" height="600px" />
            </div>
        </div><!-- .modal-content -->
    </div><!-- .modla-dialog -->
</div><!-- .modal -->


@endsection


@section('script')

    <script src="{{ asset('/admin/js/apps/file-manager.js?ver=2.0.0') }}"></script>
    <script>
        $(document).ready(function(){
        });

        function pdf_view(file_path){
            $("#pdf-src").attr('src',"{{asset('storage')}}/"+file_path);
            $('#pdf-viewer').modal('show');
        }
        
    </script>
@endsection

