<x-assan-layout layout-type="{{$layoutType}}">
            <!--page-hero-->
            <section class="bg-gradient-primary text-white position-relative">
                <div class="container pt-14 pb-9 pb-lg-12 position-relative z-1">
                    <div class="row pt-lg-5 align-items-center justify-content-center text-center">
                        <div class="col-lg-10 col-xl-7 z-2">
                            <div class="position-relative">
                                <div>
                                    <nav class="d-flex justify-content-center" aria-label="breadcrumb">
                                        <div class="mb-4">
                                            <ol class="breadcrumb mb-0">
                                                <li class="breadcrumb-item"><a href="{{ URL::asset('#') }}">Home</a></li>
                                                <li class="breadcrumb-item active">Components</li>
                                                <li class="breadcrumb-item active" aria-current="page">Form Select
                                                </li>
                                            </ol>
                                        </div>
                                    </nav>
                                    <h1 class="mb-0 display-4">
                                        Choices Select
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section class="position-relative">
                <div class="container py-9 py-lg-11">
                    <div class="card card-body mb-5">
                        <!--//////////Code Snippets start///////////////-->
                    <h6>Javascript</h6>
                    <small class="text-body-secondary d-block mb-2">Include just before the body end tag</small>
                    <div class="position-relative mb-3">
                        <!--Copy clipboard button-->
                        <button
                            class="btn btn-sm position-absolute rounded-0 end-0 top-0 z-1 mt-2 me-4 btn-primary copy-link"
                            data-clipboard-target="#copyMainJs" data-clipboard-action="copy"
                            id="copyMainJs1">Copy
                            Code</button>
<pre id="copyMainJs" class="language-markup bg-secondary text-white-50 mt-0" data-lang="javascript" style="max-height: 340px; overflow-y: auto;">
<code>
&lt;!--Select scripts-->
 &lt;script src="{{ URL::asset('assets/vendor/node_modules/js/choices.min.js') }}">&lt;/script>
 &lt;script>
 var cSelect = document.querySelectorAll("[data-choices]");
  cSelect.forEach(el => {
    const t = { ...el.dataset.choices ? JSON.parse(el.dataset.choices) : {},
     ...{
         classNames: {
         containerInner: el.className,
         input: "form-control",
         inputCloned: "form-control-sm",
         listDropdown: "dropdown-menu",
         itemChoice: "dropdown-item",
         activeState: "show",
         selectedState: "active"
         }
 }
}
new Choices(el, t)
});
&lt;/script>
</code>
</pre>
                    </div>
                    <!--//////////Code Snippets end///////////////-->
                    <!--//////////Code Snippets start///////////////-->
                    <h6 class="mt-2">Css</h6>
                    <small class="text-body-secondary d-block mb-2">Include page head tag</small>
                    <div class="position-relative">
                        <!--Copy clipboard button-->
                        <button
                            class="btn btn-sm position-absolute rounded-0 end-0 top-0 z-1 mt-2 me-4 btn-primary copy-link"
                            data-clipboard-target="#copyMainCss" data-clipboard-action="copy"
                            id="copyMainCss1">Copy
                            Code</button>
<pre id="copyMainCss" class="language-markup bg-secondary text-white-50 mt-0" data-lang="javascript" style="max-height: 340px; overflow-y: auto;">
<code>
&lt;!--Select css-->
&lt;link rel="stylesheet" href="{{ URL::asset('assets/vendor/node_modules/css/choices.min.css') }}">
</code>
</pre>
                    </div>
                    <!--//////////Code Snippets end///////////////-->
                    </div>
                    <div class="row">

                        <div class="col-12 col-md-6 mb-4">
                            <div class="card card-body">
                                <!--Basic select demo-->
                                <label for="chBasic" class="form-label h5">Basic Demo</label>
                                <select id="chBasic" class="form-control"
                                    data-choices='{"searchEnabled":false, "allowHTML":true,"itemSelectText":""}'>
                                    <option value="" disabled>Select User</option>
                                    <option value="Adam">Adam</option>
                                    <option value="Mark">Mark</option>
                                    <option value="John">John</option>
                                    <option value="Varun">Varun</option>
                                    <option value="Joseph">Joseph</option>
                                    <option value="Smith">Smith</option>
                                </select>
                                <!--//////////Code Snippets start///////////////-->
                                <h6 class="mt-5">HTML</h6>
                                <small class="text-body-secondary d-block mb-3">Copy and paste into HTML</small>
                                <div class="position-relative mb-3">
                                    <!--Copy clipboard button-->
                                    <button
                                        class="btn btn-sm position-absolute rounded-0 end-0 top-0 z-1 mt-2 me-2 btn-primary copy-link"
                                        data-clipboard-target="#copySelectBasic" data-clipboard-action="copy"
                                        id="copySelectBasic1">Copy
                                        Code</button>
                                    <pre id="copySelectBasic" class="language-markup bg-secondary text-white-50 mt-0" data-lang="html">
<code>
&lt;!--Basic select demo-->
&lt;label for="chBasic" class="form-label">Basic Demo&lt;/label>
&lt;select id="chBasic" class="form-control" data-choices='{"searchEnabled":false, "allowHTML":true,"itemSelectText":""}'>
 &lt;option value="" disabled>Select User&lt;/option>
 &lt;option value="Adam">Adam&lt;/option>
 &lt;option value="Mark">Mark&lt;/option>
 &lt;option value="John">John&lt;/option>
 &lt;option value="Varun">Varun&lt;/option>
 &lt;option value="Joseph">Joseph&lt;/option>
 &lt;option value="Smith">Smith&lt;/option>
&lt;/select>
</code>
</pre>
                                </div>
                                <!--//////////Code Snippets end///////////////-->
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-4">
                            <div class="card card-body">
                                <label for="chWidth" class="form-label">Custom Width</label>
                                <div class="width-14x">
                                    <select id="chWidth" class="form-control form-control-sm"
                                        data-choices='{"searchEnabled":false, "allowHTML":true,"itemSelectText":""}'>
                                        <option value="" disabled>Quantity</option>
                                        <option value="01">01</option>
                                        <option value="02">02</option>
                                        <option value="03">03</option>
                                        <option value="04">04</option>
                                        <option value="05">05</option>
                                        <option value="06">06</option>
                                    </select>
                                </div>

                                <!--//////////Code Snippets start///////////////-->
                                <h6 class="mt-5">HTML</h6>
                                <small class="text-body-secondary d-block mb-3">Copy and paste into HTML</small>
                                <div class="position-relative mb-3">
                                    <!--Copy clipboard button-->
                                    <button
                                        class="btn btn-sm position-absolute rounded-0 end-0 top-0 z-1 mt-2 me-2 btn-primary copy-link"
                                        data-clipboard-target="#copySelectWidth" data-clipboard-action="copy"
                                        id="copySelectWidth1">Copy
                                        Code</button>
                                    <pre id="copySelectWidth" class="language-markup bg-secondary text-white-50 mt-0" data-lang="html">
  <code>
  &lt;!--Custom width select demo-->
  &lt;div class="width-14x">
   &lt;select id="chWidth" class="form-control form-control-sm" data-choices='{"searchEnabled":false, "allowHTML":true,"itemSelectText":""}'>
    &lt;option value="" disabled>Quantity&lt;/option>
    &lt;option value="01">01&lt;/option>
    &lt;option value="02">02&lt;/option>
    &lt;option value="03">03&lt;/option>
    &lt;option value="04">04&lt;/option>
    &lt;option value="05">05&lt;/option>
    &lt;option value="06">06&lt;/option>
   &lt;/select>
&lt;/div>
</code>
</pre>
                                </div>
                                <!--//////////Code Snippets end///////////////-->
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-4">
                            <div class="card card-body">
                                <!--Searchable Select Box-->
                                <label for="Searchable" class="form-label">Searchable</label>
                                <div>
                                    <select id="Searchable" class="form-control"
                                        data-choices='{"searchEnabled":true, "allowHTML":true,"itemSelectText":""}'>
                                        <option value="" disabled>Country</option>
                                        <option value="Usa">Usa</option>
                                        <option value="Uk">Uk</option>
                                        <option value="India">India</option>
                                        <option value="France">France</option>
                                        <option value="Japan">Japan</option>
                                        <option value="Ukrain">Ukrain</option>
                                        <option value="Poland">Poland</option>
                                        <option value="Kenya">Kenya</option>
                                        <option value="Sweden">Sweden</option>
                                        <option value="Germany">Germany</option>
                                    </select>
                                </div>
                                <!--//////////Code Snippets start///////////////-->
                                <h6 class="mt-5">HTML</h6>
                                <small class="text-body-secondary d-block mb-3">Copy and paste into HTML</small>
                                <div class="position-relative mb-3">
                                    <!--Copy clipboard button-->
                                    <button
                                        class="btn btn-sm position-absolute rounded-0 end-0 top-0 z-1 mt-2 me-2 btn-primary copy-link"
                                        data-clipboard-target="#copySelectSearchable" data-clipboard-action="copy"
                                        id="copySelectSearchable1">Copy
                                        Code</button>
                                    <pre id="copySelectSearchable" class="language-markup bg-secondary text-white-50 mt-0" data-lang="html">
  <code>
    &lt;!--Searchable Select Box-->
    &lt;label for="Searchable" class="form-label">Searchable&lt;/label>
    &lt;div>
        &lt;select id="Searchable" class="form-control" data-choices='{"searchEnabled":true, "allowHTML":true,"itemSelectText":""}'>
            &lt;option value="" disabled>Country&lt;/option>
            &lt;option value="Usa">Usa&lt;/option>
            &lt;option value="Uk">Uk&lt;/option>
            &lt;option value="India">India&lt;/option>
            &lt;option value="France">France&lt;/option>
            &lt;option value="Japan">Japan&lt;/option>
            &lt;option value="Ukrain">Ukrain&lt;/option>
            &lt;option value="Poland">Poland&lt;/option>
            &lt;option value="Kenya">Kenya&lt;/option>
            &lt;option value="Sweden">Sweden&lt;/option>
            &lt;option value="Germany">Germany&lt;/option>
        &lt;/select>
    &lt;/div>
</code>
</pre>
                                </div>
                                <!--//////////Code Snippets end///////////////-->
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-4">
                            <div class="card card-body">
                                <label for="cSizing" class="form-label">Sizing</label>
                                <div class="mb-4">
                                    <!--Small-->
                                    <select id="cSizing" class="form-control-sm form-control"
                                        data-choices='{"searchEnabled":false, "allowHTML":true,"itemSelectText":""}'>
                                        <option value="" disabled>Select User</option>
                                        <option value="Adam">Adam</option>
                                        <option value="Mark">Mark</option>
                                        <option value="John">John</option>
                                        <option value="Varun">Varun</option>
                                        <option value="Joseph">Joseph</option>
                                        <option value="Smith">Smith</option>
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <!--Default-->
                                    <select id="chBasic2" class="form-control"
                                        data-choices='{"searchEnabled":false, "allowHTML":true,"itemSelectText":""}'>
                                        <option value="" disabled>Select User</option>
                                        <option value="Adam">Adam</option>
                                        <option value="Mark">Mark</option>
                                        <option value="John">John</option>
                                        <option value="Varun">Varun</option>
                                        <option value="Joseph">Joseph</option>
                                        <option value="Smith">Smith</option>
                                    </select>
                                </div>
                                <!--Large-->
                                <select id="chBasic3" class="form-control-lg form-control"
                                    data-choices='{"searchEnabled":false,"allowHTML":true, "itemSelectText":""}'>
                                    <option value="" disabled>Select User</option>
                                    <option value="Adam">Adam</option>
                                    <option value="Mark">Mark</option>
                                    <option value="John">John</option>
                                    <option value="Varun">Varun</option>
                                    <option value="Joseph">Joseph</option>
                                    <option value="Smith">Smith</option>
                                </select>

                                <!--//////////Code Snippets start///////////////-->
                                <h6 class="mt-5">HTML</h6>
                                <small class="text-body-secondary d-block mb-3">Copy and paste into HTML</small>
                                <div class="position-relative mb-3">
                                    <!--Copy clipboard button-->
                                    <button
                                        class="btn btn-sm position-absolute rounded-0 end-0 top-0 z-1 mt-2 me-4 btn-primary copy-link"
                                        data-clipboard-target="#copySelectSizing" data-clipboard-action="copy"
                                        id="copySelectSizing1">Copy
                                        Code</button>
                                    <pre id="copySelectSizing" class="language-markup bg-secondary text-white-50 mt-0" data-lang="html"
                                        style="max-height: 340px; overflow-y: auto;">
 <code>
    &lt;!--Small-->
    &lt;select id="cSizing" class="form-control-sm form-control" data-choices='{"searchEnabled":false, "allowHTML":true,"itemSelectText":""}'>
        &lt;option value="" disabled>Select User&lt;/option>
        &lt;option value="Adam">Adam&lt;/option>
        &lt;option value="Mark">Mark&lt;/option>
        &lt;option value="John">John&lt;/option>
        &lt;option value="Varun">Varun&lt;/option>
        &lt;option value="Joseph">Joseph&lt;/option>
        &lt;option value="Smith">Smith&lt;/option>
    &lt;/select>
   
    &lt;!--Default-->
    &lt;select id="chBasic2" class="form-control" data-choices='{"searchEnabled":false, "allowHTML":true,"itemSelectText":""}'>
        &lt;option value="" disabled>Select User&lt;/option>
        &lt;option value="Adam">Adam&lt;/option>
        &lt;option value="Mark">Mark&lt;/option>
        &lt;option value="John">John&lt;/option>
        &lt;option value="Varun">Varun&lt;/option>
        &lt;option value="Joseph">Joseph&lt;/option>
        &lt;option value="Smith">Smith&lt;/option>
    &lt;/select>
   
    &lt;!--Large-->
    &lt;select id="chBasic3" class="form-control-lg form-control" data-choices='{"searchEnabled":false,"allowHTML":true}'>
        &lt;option value="" disabled>Select User&lt;/option>
        &lt;option value="Adam">Adam&lt;/option>
        &lt;option value="Mark">Mark&lt;/option>
        &lt;option value="John">John&lt;/option>
        &lt;option value="Varun">Varun&lt;/option>
        &lt;option value="Joseph">Joseph&lt;/option>
        &lt;option value="Smith">Smith&lt;/option>
    &lt;/select>
</code>
</pre>
                                </div>
                                <!--//////////Code Snippets end///////////////-->
                            </div>
                        </div>



                        <div class="col-12 mb-4">
                            <div class="card card-body">
                                <p class="form-label">Multiple</p>
                                <div class="mb-4">
                                    <!--Multiple select-->
                                    <input type="text" class="form-control"
                                        data-choices='{"silent": true,"removeItems": "true","removeItemButton": "true", "allowHTML":true}'>

                                </div>
                                <p class="form-label">Multiple select with Available Options</p>
                                <!--Multiple select with available options-->
                                <select multiple class="form-control"
                                    data-choices='{"silent": true,"removeItems": "true","removeItemButton": "true", "allowHTML":true}'>
                                    <option value="Html">HTML</option>
                                    <option value="Css">Css</option>
                                    <option value="Bootstrap">Bootstrap</option>
                                    <option value="Figma">Figma</option>
                                    <option value="Js">Js</option>
                                </select>

                                <!--//////////Code Snippets start///////////////-->
                                <h6 class="mt-5">HTML</h6>
                                <small class="text-body-secondary d-block mb-3">Copy and paste into HTML</small>
                                <div class="position-relative mb-3">
                                    <!--Copy clipboard button-->
                                    <button
                                        class="btn btn-sm position-absolute rounded-0 end-0 top-0 z-1 mt-2 me-2 btn-primary copy-link"
                                        data-clipboard-target="#copySelectMultiple" data-clipboard-action="copy"
                                        id="copySelectMultiple1">Copy
                                        Code</button>
                                    <pre id="copySelectMultiple" class="language-markup bg-secondary text-white-50 mt-0" data-lang="html">
    <code>
&lt;!--Multiple select-->
 &lt;input type="text" class="form-control"
            data-choices='{"silent": true,"removeItems": "true","removeItemButton": "true", "allowHTML":true}'>
        
&lt;!--Multiple select with available options-->
 &lt;select multiple class="form-control"
 data-choices='{"silent": true,"removeItems": "true","removeItemButton": "true", "allowHTML":true}'>
  &lt;option value="Html">HTML&lt;/option>
  &lt;option value="Css">Css&lt;/option>
  &lt;option value="Bootstrap">Bootstrap&lt;/option>
  &lt;option value="Figma">Figma&lt;/option>
 &lt;option value="Js">Js&lt;/option>
&lt;/select> 
  </code>
  </pre>
                                </div>
                                <!--//////////Code Snippets end///////////////-->
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card card-body">
                                <p class="form-label">With Image <span class="badge bg-success ms-2">New</span></p>
                               <div class="w-lg-30 mb-5 w-md-50 w-sm-75">
                                 <!--With Image select-->
                                 <select id="chImage" class="form-control choices-image">
                                </select>
                               </div>
                               <nav class="nav-tabs nav">
                                <a href="{{ URL::asset('#copyImageHtml') }}" class="nav-link active" data-bs-toggle="tab">HTML</a>
                                <a href="{{ URL::asset('#copyImageJs') }}" class="nav-link" data-bs-toggle="tab">Js</a>
                               </nav>
                               <div class="tab-content">
                                <div class="tab-pane fade show active" id="copyImageHtml">
                                    <!--//////////Code Snippets start///////////////-->
                    <div class="position-relative">
                        <!--Copy clipboard button-->
                        <button
                            class="btn btn-sm position-absolute rounded-0 end-0 top-0 z-1 mt-2 me-4 btn-primary copy-link"
                            data-clipboard-target="#copyImageHTML" data-clipboard-action="copy"
                            id="copyImageHTML1">Copy
                            Code</button>
<pre id="copyImageHTML" class="language-markup bg-secondary text-white-50 mt-0" data-lang="javascript" style="max-height: 340px; overflow-y: auto;">
<code>
 &lt;!--With Image select-->
 &lt;select id="chImage" class="form-control choices-image">
 &lt;/select>
</code>
</pre>
                    </div>
                    <!--//////////Code Snippets end///////////////-->
                                </div>
                                <div class="tab-pane fade" id="copyImageJs">
                                       <!--//////////Code Snippets start///////////////-->
                    <div class="position-relative">
                        <!--Copy clipboard button-->
                        <button
                            class="btn btn-sm position-absolute rounded-0 end-0 top-0 z-1 mt-2 me-4 btn-primary copy-link"
                            data-clipboard-target="#copyImageJs" data-clipboard-action="copy"
                            id="copyImageJs1">Copy
                            Code</button>
<pre id="copyImageJs" class="language-markup bg-secondary text-white-50 mt-0" data-lang="javascript" style="max-height: 340px; overflow-y: auto;">
<code>
&lt;script>
        //Images Array
        var selectImages = [{
                value: 'John Doe',
                label: '&lt;img src="{{ URL::asset('assets/img/avatar/6.jpg') }}" class="rounded-pill width-3x h-auto me-2" alt=""> John Doe'
            },
            {
                value: 'Julia Roberts',
                label: '&lt;img src="{{ URL::asset('assets/img/avatar/1.jpg') }}" class="rounded-pill width-3x h-auto me-2" alt=""> Julia Roberts'
            },
            {
                value: 'Mark Otto',
                label: '&lt;img src="{{ URL::asset('assets/img/avatar/7.jpg') }}" class="rounded-pill width-3x h-auto me-2" alt=""> Mark Otto'
            },
            {
                value: 'Micheal Smith',
                label: '&lt;img src="{{ URL::asset('assets/img/avatar/8.jpg') }}" class="rounded-pill width-3x h-auto me-2" alt=""> Micheal Smith'
            },

        ];
        const element = document.querySelector('.choices-image');
        const choices = new Choices(element, {
            choices: selectImages,
            values: null,
            allowHTML: true,
            itemSelectText: "",
            classNames: {
                containerInner: element.className,
                input: 'form-control',
                inputCloned: 'form-control-xs',
                listDropdown: 'dropdown-menu',
                itemChoice: 'dropdown-item',
                activeState: 'show',
                selectedState: 'active',
            },
        });
&lt;/script>
</code>
</pre>
                    </div>
                    <!--//////////Code Snippets end///////////////-->
                                </div>
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--Call to action-->
            <section class="bg-gradient bg-secondary text-white position-relative">
                <div class="container py-9 py-lg-11">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-lg-10 col-xl-9 text-center mx-auto">
                            <h2 class="mb-4 display-4" data-aos="fade-up">
                                Accelerate your business online
                            </h2>
                            <p class="lead mb-5 opacity-75" data-aos="fade-up">Build any type of landing page ease.</p>
                            <div data-aos="fade-up">
                                <a href="{{ URL::asset('#!') }}" class="btn btn-primary btn-lg">Purchase a license</a>
                            </div>
                        </div>
                        <!--End Col-->
                    </div> <!-- / .row -->
                </div> <!-- / .container -->
            </section>
</x-assan-layout>
