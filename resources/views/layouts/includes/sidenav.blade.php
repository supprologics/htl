
<div class="nk-sidebar nk-sidebar-fixed " data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-sidebar-brand">
            <a href="html/index.html" class="logo-link nk-sidebar-logo">
                <img class="logo-light logo-img" src="./images/logo.png" srcset="./images/logo2x.png 2x" alt="logo">
                <img class="logo-dark logo-img" src="./images/logo-dark.png" srcset="./images/logo-dark2x.png 2x" alt="logo-dark">
            </a>
        </div>
        <div class="nk-menu-trigger mr-n2">
            <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
        </div>
    </div><!-- .nk-sidebar-element -->
    <div class="nk-sidebar-element">
        <div class="nk-sidebar-body" data-simplebar>
            <div class="nk-sidebar-content">
                <div class="nk-sidebar-menu">
                    <ul class="nk-menu">
                        <li class="nk-menu-heading">
                            <h6 class="overline-title text-primary-alt">HTL FOUNDDATION Preview</h6>
                        </li><!-- .nk-menu-item -->
                        <li class="nk-menu-item">
                            <a href="html/crypto/index.html" class="nk-menu-link" target="_blank">
                                <span class="nk-menu-icon"><em class="icon ni ni-dashboard"></em></span>
                                <span class="nk-menu-text">HTL Panel</span><span class="nk-menu-badge badge-danger">HOT</span>
                            </a>
                        </li><!-- .nk-menu-item -->
                        <li class="nk-menu-heading">
                            <h6 class="overline-title text-primary-alt">Subject Department</h6>
                        </li><!-- .nk-menu-item -->
                        <li class="nk-menu-item">
                            <a href="{{ route('lecturer.lessonapprove')}}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-list-thumb-alt"></em></span>
                                <span class="nk-menu-text">Lessons Approval</span>
                            </a>
                        </li><!-- .nk-menu-item -->
                        <li class="nk-menu-item">
                            <a href="{{ route('subject.index')}}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-list-thumb-alt"></em></span>
                                <span class="nk-menu-text">Subject Manage</span>
                            </a>
                        </li><!-- .nk-menu-item -->
                        <li class="nk-menu-item">
                            <a href="{{ route('grade.index')}}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-view-grid-wd"></em></span>
                                <span class="nk-menu-text">Grade Manage</span>
                            </a>
                        </li><!-- .nk-menu-item -->
                        <li class="nk-menu-item has-sub">
                            <a href="#" class="nk-menu-link nk-menu-toggle" data-original-title="" title="">
                                <span class="nk-menu-icon"><em class="icon ni ni-setting"></em></span>
                                <span class="nk-menu-text">Configurations</span>
                            </a>
                            <ul class="nk-menu-sub" style="display: none;">
                                <li class="nk-menu-item">
                                    <a href="{{ route('referencetype.typeindex')}}" class="nk-menu-link" data-original-title="" title=""><span class="nk-menu-text">References Docs Types</span></a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="{{ route('medium.index')}}" class="nk-menu-link" data-original-title="" title=""><span class="nk-menu-text">Medium</span></a>
                                </li>
                            </ul><!-- .nk-menu-sub -->
                        </li>
                        <li class="nk-menu-heading">
                            <h6 class="overline-title text-primary-alt">Lectures Department</h6>
                        </li><!-- .nk-menu-heading -->
                        <li class="nk-menu-item">
                            <a href="{{ route('lecturer.index')}}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-user"></em></span>
                                <span class="nk-menu-text">Lecture Manage</span>
                            </a>
                        </li><!-- .nk-menu-item -->
                        <li class="nk-menu-heading">
                            <h6 class="overline-title text-primary-alt">Students Department</h6>
                        </li><!-- .nk-menu-heading -->
                        <li class="nk-menu-item">
                            <a href="{{ route('enrolled.students')}}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-user-alt"></em></span>
                                <span class="nk-menu-text">Student Manage</span>
                            </a>
                        </li><!-- .nk-menu-item -->
                        <li class="nk-menu-heading">
                            <h6 class="overline-title text-primary-alt">Lesson Forums</h6>
                        </li><!-- .nk-menu-heading -->
                        <li class="nk-menu-item">
                            <a href="{{ route('forum.index') }}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-user-alt"></em></span>
                                <span class="nk-menu-text">Forums</span>
                            </a>
                        </li><!-- .nk-menu-item -->
                    </ul><!-- .nk-menu -->
                </div><!-- .nk-sidebar-menu -->
                <div class="nk-sidebar-footer">
                    <ul class="nk-menu nk-menu-footer">
                        <li class="nk-menu-item">
                            <a href="#" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-help-alt"></em></span>
                                <span class="nk-menu-text">Support</span>
                            </a>
                        </li>
                    </ul><!-- .nk-footer-menu -->
                </div><!-- .nk-sidebar-footer -->
            </div><!-- .nk-sidebar-content -->
        </div><!-- .nk-sidebar-body -->
    </div><!-- .nk-sidebar-element -->
</div>