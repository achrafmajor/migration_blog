<div class="row">
    <div class=" col-12 ">
        <ul class="nav nav-tabs nav-tabs-solid border-0">
            <li class="nav-item"><a href="#solid-tab1" class="nav-link active" data-toggle="tab">Generale</a></li>
            <li class="nav-item"><a href="#solid-tab2" class="nav-link " data-toggle="tab">Logo</a></li>
            <li class="nav-item"><a href="#solid-tab3" class="nav-link " data-toggle="tab">Site Web</a></li>
            <li class="nav-item"><a href="#solid-tab4" class="nav-link " data-toggle="tab">SEO</a></li>
            <li class="nav-item"><a href="#solid-tab5" class="nav-link " data-toggle="tab">Resau sociaux</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade active show" id="solid-tab1">
                @include('admin.pages.setting.general-form')
            </div>
            <div class="tab-pane fade " id="solid-tab2">
                @include('admin.pages.setting.Logos')
            </div>
            <div class="tab-pane fade " id="solid-tab3">
                @include('admin.pages.setting.website')
            </div>
            <div class="tab-pane fade " id="solid-tab4">
                @include('admin.pages.setting.seo-form')
            </div>
            <div class="tab-pane fade " id="solid-tab5">
                @include('admin.pages.setting.social-form')
            </div>
        </div>
       
        <button type="submit" class="btn btn-primary submit-btn">Validé<i class="icon-paperplane ml-2"></i></button>
    </div>
</div>