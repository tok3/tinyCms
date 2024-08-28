<!doctype html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="{{ URL::asset('assets/img/favicon.ico') }}" type="image/ico">

        <!--Box Icons-->
        <link rel="stylesheet" href="{{ URL::asset('assets/fonts/boxicons/css/boxicons.min.css') }}">
        <!--Iconsmind Icons-->
        <link rel="stylesheet" href="{{ URL::asset('assets/fonts/iconsmind/iconsmind.css') }}">
        <!--Select box-->
        <link rel="stylesheet" href="{{ URL::asset('assets/vendor/node_modules/css/choices.min.css') }}">
        <!--Form steps css-->
        <link rel="stylesheet" href="{{ URL::asset('assets/vendor/node_modules/css/bs-stepper.min.css') }}">
        <!--Flatpickr-->
        <link rel="stylesheet" href="{{ URL::asset('assets/vendor/node_modules/css/flatpickr.min.css') }}">
        <!-- Aos Animations CSS -->
        <link href="{{ URL::asset('assets/vendor/node_modules/css/aos.css') }}" rel="stylesheet">
        <!-- Google fonts CSS -->
        <link rel="preconnect" href="{{ URL::asset('https://fonts.googleapis.com') }}">
        <link rel="preconnect" href="{{ URL::asset('https://fonts.gstatic.com') }}" crossorigin>
        <link href="{{ URL::asset('https://fonts.googleapis.com/css2?family=Onest:wght@100..900&family=PT+Serif:ital@0;1&display=swap') }}" rel="stylesheet">
        <link href="{{ URL::asset('assets/css/theme-green.min.css') }}" rel="stylesheet">

        <title>Assan 4</title>
    </head>

    <body>
        <x-partials.preloader />
        <!--Header Start-->
        <header class="z-fixed header-absolute-top header-transparent sticky-reverse">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container position-relative">
                     <!--:Brand Logo:-->
                     <a class="navbar-brand" href="{{ URL::asset('demo-jobs.html') }}">
                        <img src="{{ URL::asset('assets/img/logo/logo.svg') }}" alt="" class="img-fluid navbar-brand-light">
                        <img src="{{ URL::asset('assets/img/logo/logo-white.svg') }}" alt="" class="img-fluid navbar-brand-dark">
                        <sub class="d-none d-sm-inline-block position-absolute end-0 bottom-0 me-n2 mb-n2">Jobs</sub>
                    </a>
                    <div class="d-flex align-items-center navbar-no-collapse-items order-lg-last">
                        <div class="nav-item btn-group me-2 me-lg-0">
                            <a href="{{ URL::asset('demo-jobs-post-job.html') }}" class="btn btn-outline-info btn-sm py-1 px-3">Post Job</a>
                            <a href="{{ URL::asset('#!') }}" class="btn btn-sm btn-outline-info py-1 px-3"><i
                                    class="bx bxs-user-circle me-1"></i>SignUp</a>
                        </div>
                        <button class="navbar-toggler order-last" type="button" data-bs-toggle="collapse"
                            data-bs-target="#mainNavbarTheme" aria-controls="mainNavbarTheme" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon">
                                <i></i>
                            </span>
                        </button>

                    </div>
                    <div class="collapse navbar-collapse" id="mainNavbarTheme">

                        <ul class="navbar-nav me-lg-3 ms-lg-auto">
                            <li class="nav-item">
                                <a href="{{ URL::asset('demo-jobs.html') }}" class="nav-link">Home</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="{{ URL::asset('#') }}" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Jobs listing</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ URL::asset('demo-jobs-listing.html') }}">Lisitng Row</a>
                                    <a class="dropdown-item" href="{{ URL::asset('demo-jobs-listing-grid.html') }}">Lisitng Grid</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="{{ URL::asset('#') }}" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ URL::asset('demo-jobs-job-detail.html') }}">Job Details</a>
                                    <a class="dropdown-item" href="{{ URL::asset('demo-jobs-job-apply.html') }}">Apply for Job</a>
                                    <a class="dropdown-item" href="{{ URL::asset('demo-jobs-employer.html') }}">Employer</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="{{ URL::asset('demo-jobs-upload-resume.html') }}" class="nav-link active">Upload Resume</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="{{ URL::asset('#') }}" data-bs-toggle="dropdown" class="nav-link dropdown-toggle">Eng</a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="{{ URL::asset('#!') }}" class="active dropdown-item">
                                        <img src="{{ URL::asset('assets/img/country/us.svg') }}" class="me-2" width="20" alt="">
                                        <small>English</small>
                                    </a>
                                    <a href="{{ URL::asset('#!') }}" class="dropdown-item">
                                        <img src="{{ URL::asset('assets/img/country/pt.svg') }}" class="me-2" width="20" alt="">
                                        <small>Portuguese</small>
                                    </a>
                                    <a href="{{ URL::asset('#!') }}" class="dropdown-item">
                                        <img src="{{ URL::asset('assets/img/country/de.svg') }}" class="me-2" width="20" alt="">
                                        <small>German</small>
                                    </a>
                                    <a href="{{ URL::asset('#!') }}" class="dropdown-item">
                                        <img src="{{ URL::asset('assets/img/country/fr.svg') }}" class="me-2" width="20" alt="">
                                        <small>French</small>
                                    </a>
                                    <a href="{{ URL::asset('#!') }}" class="dropdown-item">
                                        <img src="{{ URL::asset('assets/img/country/dk.svg') }}" class="me-2" width="20" alt="">
                                        <small>Danish</small>
                                    </a>
                                    <a href="{{ URL::asset('#!') }}" class="dropdown-item">
                                        <img src="{{ URL::asset('assets/img/country/es.svg') }}" class="me-2" width="20" alt="">
                                        <small>Española</small>
                                    </a>
                                    <a href="{{ URL::asset('#!') }}" class="dropdown-item">
                                        <img src="{{ URL::asset('assets/img/country/nl.svg') }}" class="me-2" width="20" alt="">
                                        <small>Dutch</small>
                                    </a>
                                    <a href="{{ URL::asset('#!') }}" class="dropdown-item">
                                        <img src="{{ URL::asset('assets/img/country/jp.svg') }}" class="me-2" width="20" alt="">
                                        <small>japanese</small>
                                    </a>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <!--Main content-->
        <main>
{{$slot}}
        </main>
        <x-partials.footers.footer-jobs />
          <!-- begin:Back to Top button -->
    <a href="{{ URL::asset('#') }}" class="toTop"><svg class="progress-circle" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
        <circle cx="50" cy="50" r="40" fill="none" stroke="currentColor" stroke-width="4" stroke-dasharray="0, 251.2"></circle>
      </svg>
            <i class="bx bxs-up-arrow"></i>
          </a>
          <!-- begin:Back to Top button -->
        <!-- scripts -->
        <script src="{{ URL::asset('assets/js/theme.bundle.js') }}"></script>
        <!--Select scripts-->
        <script src="{{ URL::asset('assets/vendor/node_modules/js/choices.min.js') }}"></script>
        <script>
            var cSelect = document.querySelectorAll("[data-choices]");
            cSelect.forEach(el => {
                const t = {
                    ...el.dataset.choices ? JSON.parse(el.dataset.choices) : {},
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

        </script>

<!--Country select with flags-->
<script>
    var countries = [
      { value: 'Afghanistan', text: 'AF' },
      { value: 'Åland Islands', text: 'AX' },
      { value: 'Albania', text: 'AL' },
      { value: 'Algeria', text: 'DZ' },
      { value: 'American Samoa', text: 'AS' },
      { value: 'Andorra', text: 'AD' },
      { value: 'Angola', text: 'AO' },
      { value: 'Anguilla', text: 'AI' },
      { value: 'Antarctica', text: 'AQ' },
      { value: 'Antigua and Barbuda', text: 'AG' },
      { value: 'Argentina', text: 'AR' },
      { value: 'Armenia', text: 'AM' },
      { value: 'Aruba', text: 'AW' },
      { value: 'Australia', text: 'AU' },
      { value: 'Austria', text: 'AT' },
      { value: 'Azerbaijan', text: 'AZ' },
      { value: 'Bahamas', text: 'BS' },
      { value: 'Bahrain', text: 'BH' },
      { value: 'Bangladesh', text: 'BD' },
      { value: 'Barbados', text: 'BB' },
      { value: 'Belarus', text: 'BY' },
      { value: 'Belgium', text: 'BE' },
      { value: 'Belize', text: 'BZ' },
      { value: 'Benin', text: 'BJ' },
      { value: 'Bermuda', text: 'BM' },
      { value: 'Bhutan', text: 'BT' },
      { value: 'Bolivia', text: 'BO' },
      { value: 'Bosnia and Herzegovina', text: 'BA' },
      { value: 'Botswana', text: 'BW' },
      { value: 'Bouvet Island', text: 'BV' },
      { value: 'Brazil', text: 'BR' },
      { value: 'British Indian Ocean Territory', text: 'IO' },
      { value: 'Brunei Darussalam', text: 'BN' },
      { value: 'Bulgaria', text: 'BG' },
      { value: 'Burkina Faso', text: 'BF' },
      { value: 'Burundi', text: 'BI' },
      { value: 'Cambodia', text: 'KH' },
      { value: 'Cameroon', text: 'CM' },
      { value: 'Canada', text: 'CA' },
      { value: 'Cape Verde', text: 'CV' },
      { value: 'Cayman Islands', text: 'KY' },
      { value: 'Central African Republic', text: 'CF' },
      { value: 'Chad', text: 'TD' },
      { value: 'Chile', text: 'CL' },
      { value: 'China', text: 'CN' },
      { value: 'Christmas Island', text: 'CX' },
      { value: 'Cocos (Keeling) Islands', text: 'CC' },
      { value: 'Colombia', text: 'CO' },
      { value: 'Comoros', text: 'KM' },
      { value: 'Congo', text: 'CG' },
      { value: 'Congo, The Democratic Republic of the', text: 'CD' },
      { value: 'Cook Islands', text: 'CK' },
      { value: 'Costa Rica', text: 'CR' },
      { value: "Cote D'Ivoire", text: 'CI' },
      { value: 'Croatia', text: 'HR' },
      { value: 'Cuba', text: 'CU' },
      { value: 'Cyprus', text: 'CY' },
      { value: 'Czech Republic', text: 'CZ' },
      { value: 'Denmark', text: 'DK' },
      { value: 'Djibouti', text: 'DJ' },
      { value: 'Dominica', text: 'DM' },
      { value: 'Dominican Republic', text: 'DO' },
      { value: 'Ecuador', text: 'EC' },
      { value: 'Egypt', text: 'EG' },
      { value: 'El Salvador', text: 'SV' },
      { value: 'Equatorial Guinea', text: 'GQ' },
      { value: 'Eritrea', text: 'ER' },
      { value: 'Estonia', text: 'EE' },
      { value: 'Ethiopia', text: 'ET' },
      { value: 'Falkland Islands (Malvinas)', text: 'FK' },
      { value: 'Faroe Islands', text: 'FO' },
      { value: 'Fiji', text: 'FJ' },
      { value: 'Finland', text: 'FI' },
      { value: 'France', text: 'FR' },
      { value: 'French Guiana', text: 'GF' },
      { value: 'French Polynesia', text: 'PF' },
      { value: 'French Southern Territories', text: 'TF' },
      { value: 'Gabon', text: 'GA' },
      { value: 'Gambia', text: 'GM' },
      { value: 'Georgia', text: 'GE' },
      { value: 'Germany', text: 'DE' },
      { value: 'Ghana', text: 'GH' },
      { value: 'Gibraltar', text: 'GI' },
      { value: 'Greece', text: 'GR' },
      { value: 'Greenland', text: 'GL' },
      { value: 'Grenada', text: 'GD' },
      { value: 'Guadeloupe', text: 'GP' },
      { value: 'Guam', text: 'GU' },
      { value: 'Guatemala', text: 'GT' },
      { value: 'Guernsey', text: 'GG' },
      { value: 'Guinea', text: 'GN' },
      { value: 'Guinea-Bissau', text: 'GW' },
      { value: 'Guyana', text: 'GY' },
      { value: 'Haiti', text: 'HT' },
      { value: 'Heard Island and Mcdonald Islands', text: 'HM' },
      { value: 'Holy See (Vatican City State)', text: 'VA' },
      { value: 'Honduras', text: 'HN' },
      { value: 'Hong Kong', text: 'HK' },
      { value: 'Hungary', text: 'HU' },
      { value: 'Iceland', text: 'IS' },
      { value: 'India', text: 'IN' },
      { value: 'Indonesia', text: 'ID' },
      { value: 'Iran, Islamic Republic Of', text: 'IR' },
      { value: 'Iraq', text: 'IQ' },
      { value: 'Ireland', text: 'IE' },
      { value: 'Isle of Man', text: 'IM' },
      { value: 'Israel', text: 'IL' },
      { value: 'Italy', text: 'IT' },
      { value: 'Jamaica', text: 'JM' },
      { value: 'Japan', text: 'JP' },
      { value: 'Jersey', text: 'JE' },
      { value: 'Jordan', text: 'JO' },
      { value: 'Kazakhstan', text: 'KZ' },
      { value: 'Kenya', text: 'KE' },
      { value: 'Kiribati', text: 'KI' },
      { value: "Korea, Democratic People'S Republic of", text: 'KP' },
      { value: 'Korea, Republic of', text: 'KR' },
      { value: 'Kuwait', text: 'KW' },
      { value: 'Kyrgyzstan', text: 'KG' },
      { value: "Lao People'S Democratic Republic", text: 'LA' },
      { value: 'Latvia', text: 'LV' },
      { value: 'Lebanon', text: 'LB' },
      { value: 'Lesotho', text: 'LS' },
      { value: 'Liberia', text: 'LR' },
      { value: 'Libyan Arab Jamahiriya', text: 'LY' },
      { value: 'Liechtenstein', text: 'LI' },
      { value: 'Lithuania', text: 'LT' },
      { value: 'Luxembourg', text: 'LU' },
      { value: 'Macao', text: 'MO' },
      { value: 'Macedonia, The Former Yugoslav Republic of', text: 'MK' },
      { value: 'Madagascar', text: 'MG' },
      { value: 'Malawi', text: 'MW' },
      { value: 'Malaysia', text: 'MY' },
      { value: 'Maldives', text: 'MV' },
      { value: 'Mali', text: 'ML' },
      { value: 'Malta', text: 'MT' },
      { value: 'Marshall Islands', text: 'MH' },
      { value: 'Martinique', text: 'MQ' },
      { value: 'Mauritania', text: 'MR' },
      { value: 'Mauritius', text: 'MU' },
      { value: 'Mayotte', text: 'YT' },
      { value: 'Mexico', text: 'MX' },
      { value: 'Micronesia, Federated States of', text: 'FM' },
      { value: 'Moldova, Republic of', text: 'MD' },
      { value: 'Monaco', text: 'MC' },
      { value: 'Mongolia', text: 'MN' },
      { value: 'Montserrat', text: 'MS' },
      { value: 'Morocco', text: 'MA' },
      { value: 'Mozambique', text: 'MZ' },
      { value: 'Myanmar', text: 'MM' },
      { value: 'Namibia', text: 'NA' },
      { value: 'Nauru', text: 'NR' },
      { value: 'Nepal', text: 'NP' },
      { value: 'Netherlands', text: 'NL' },
      { value: 'Netherlands Antilles', text: 'AN' },
      { value: 'New Caledonia', text: 'NC' },
      { value: 'New Zealand', text: 'NZ' },
      { value: 'Nicaragua', text: 'NI' },
      { value: 'Niger', text: 'NE' },
      { value: 'Nigeria', text: 'NG' },
      { value: 'Niue', text: 'NU' },
      { value: 'Norfolk Island', text: 'NF' },
      { value: 'Northern Mariana Islands', text: 'MP' },
      { value: 'Norway', text: 'NO' },
      { value: 'Oman', text: 'OM' },
      { value: 'Pakistan', text: 'PK' },
      { value: 'Palau', text: 'PW' },
      { value: 'Palestinian Territory, Occupied', text: 'PS' },
      { value: 'Panama', text: 'PA' },
      { value: 'Papua New Guinea', text: 'PG' },
      { value: 'Paraguay', text: 'PY' },
      { value: 'Peru', text: 'PE' },
      { value: 'Philippines', text: 'PH' },
      { value: 'Pitcairn', text: 'PN' },
      { value: 'Poland', text: 'PL' },
      { value: 'Portugal', text: 'PT' },
      { value: 'Puerto Rico', text: 'PR' },
      { value: 'Qatar', text: 'QA' },
      { value: 'Reunion', text: 'RE' },
      { value: 'Romania', text: 'RO' },
      { value: 'Russian Federation', text: 'RU' },
      { value: 'RWANDA', text: 'RW' },
      { value: 'Saint Helena', text: 'SH' },
      { value: 'Saint Kitts and Nevis', text: 'KN' },
      { value: 'Saint Lucia', text: 'LC' },
      { value: 'Saint Pierre and Miquelon', text: 'PM' },
      { value: 'Saint Vincent and the Grenadines', text: 'VC' },
      { value: 'Samoa', text: 'WS' },
      { value: 'San Marino', text: 'SM' },
      { value: 'Sao Tome and Principe', text: 'ST' },
      { value: 'Saudi Arabia', text: 'SA' },
      { value: 'Senegal', text: 'SN' },
      { value: 'Serbia and Montenegro', text: 'RS' },
      { value: 'Seychelles', text: 'SC' },
      { value: 'Sierra Leone', text: 'SL' },
      { value: 'Singapore', text: 'SG' },
      { value: 'Slovakia', text: 'SK' },
      { value: 'Slovenia', text: 'SI' },
      { value: 'Solomon Islands', text: 'SB' },
      { value: 'Somalia', text: 'SO' },
      { value: 'South Africa', text: 'ZA' },
      { value: 'South Georgia and the South Sandwich Islands', text: 'GS' },
      { value: 'Spain', text: 'ES' },
      { value: 'Sri Lanka', text: 'LK' },
      { value: 'Sudan', text: 'SD' },
      { value: 'Suriname', text: 'SR' },
      { value: 'Svalbard and Jan Mayen', text: 'SJ' },
      { value: 'Swaziland', text: 'SZ' },
      { value: 'Sweden', text: 'SE' },
      { value: 'Switzerland', text: 'CH' },
      { value: 'Syrian Arab Republic', text: 'SY' },
      { value: 'Taiwan, Province of China', text: 'TW' },
      { value: 'Tajikistan', text: 'TJ' },
      { value: 'Tanzania, United Republic of', text: 'TZ' },
      { value: 'Thailand', text: 'TH' },
      { value: 'Timor-Leste', text: 'TL' },
      { value: 'Togo', text: 'TG' },
      { value: 'Tokelau', text: 'TK' },
      { value: 'Tonga', text: 'TO' },
      { value: 'Trinidad and Tobago', text: 'TT' },
      { value: 'Tunisia', text: 'TN' },
      { value: 'Turkey', text: 'TR' },
      { value: 'Turkmenistan', text: 'TM' },
      { value: 'Turks and Caicos Islands', text: 'TC' },
      { value: 'Tuvalu', text: 'TV' },
      { value: 'Uganda', text: 'UG' },
      { value: 'Ukraine', text: 'UA' },
      { value: 'United Arab Emirates', text: 'AE' },
      { value: 'United Kingdom', text: 'GB' },
      {
        value: 'United States',
        text: 'US',
        synonym: ['USA', 'United States of America'],
      },
      { value: 'United States Minor Outlying Islands', text: 'UM' },
      { value: 'Uruguay', text: 'UY' },
      { value: 'Uzbekistan', text: 'UZ' },
      { value: 'Vanuatu', text: 'VU' },
      { value: 'Venezuela', text: 'VE' },
      { value: 'Viet Nam', text: 'VN' },
      { value: 'Virgin Islands, British', text: 'VG' },
      { value: 'Virgin Islands, U.S.', text: 'VI' },
      { value: 'Wallis and Futuna', text: 'WF' },
      { value: 'Western Sahara', text: 'EH' },
      { value: 'Yemen', text: 'YE' },
      { value: 'Zambia', text: 'ZM' },
      { value: 'Zimbabwe', text: 'ZW' },
    ];

    for (var i = 0; i < countries.length; i++) {
      countries[i].image =
        'https://cdn.jsdelivr.net/npm/svg-country-flags@1.2.10/svg/' + countries[i].text.toLowerCase() + '.svg';
       countries[i].label = `<img src="{{ URL::asset('${countries[i].image}') }}" class="width-2x h-auto me-2" alt=""/>` + countries[i].value;
    }
    const element = document.querySelector('.choices__countries');
    const choices = new Choices(element, {
      choices: countries,
      values: null,
      allowHTML: true,
      placeholder:true,
      itemSelectText:"",
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
  </script>

        <!--Bs-Stepper script-->
        <script src="{{ URL::asset('assets/vendor/node_modules/js/bs-stepper.min.js') }}"></script>
        <script>
            var stepDemo = new Stepper(document.querySelector('#stepperDemo'));
            stepDemo.next();
            stepDemo.previous()

        </script>
        <!--Autosize textarea-->
        <script src="{{ URL::asset('assets/vendor/node_modules/js/autosize.min.js') }}"></script>
        <script>
            var ta = document.querySelector('textarea');
            ta.style.display = 'none';
            autosize(ta);
            // Change layout
            ta.style.display = 'block';
            autosize.update(ta);

        </script>

        <!--Datepickr-->
        <script src="{{ URL::asset('assets/vendor/node_modules/js/flatpickr.min.js') }}"></script>
        <script>
            let pickr = document.querySelectorAll("[data-flatpickr]");
            pickr.forEach(el => {
                const t = {
                    ...el.dataset.flatpickr ? JSON.parse(el.dataset.flatpickr) : {},
                }
                new flatpickr(el, t)
            }
            );</script>
    </body>

</html>
