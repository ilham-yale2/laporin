@extends('template.user')
@section('title')
Lapor !
@endsection

@section('avatar')
<li class="mb-5" data-toggle="tooltip" title="{{Auth::user()->name}}">
    <img src="{{url('img/avatar')}}/{{Auth::user()->avatar}}" class="rounded-circle" width="40px" alt="">
</li>
@endsection
@section('header')
<h5 class="title mr-3 px-3 bg-darkGreen py-2 mb-2 px-4  radius-10"><i class="fas fa-file-alt mt-1"></i> / Laporan</h5>


@endsection

@section('panel-body')
<div class="bg-darkGreen hello pt-4 px-3 row mx-0 radius-10 ">
    <div class="col-md-7 col-12">
        <h4 class="title text-25 mt-5">Lapor sekarang ! !</h4>
        <p class="text text-16 mb-0">Di sini anda bisa membuat Laporan baru serta meninjau semua laporan anda </p>
        <p class="text text-16">Kami Harap anda melaporkan dengan keadaan yang sebenarnya</p>
        <!-- <button class="btn btn primary bg-darkBlue title text-light radius-20 px-5 ">Baca ketentuan</button> -->
        <button class="btn bg-darkBlue text-white title mb-3 radius-20 px-5" id="addLaporan"><i class="fas fa-plus"></i> Buat Laporan Baru </button>
        <button class="btn btn-secondary title mb-3 d-none radius-20 px-5" id="btn-cancel">Batal</button>
    </div>
    <div class="col-md-4 md-block ml-auto pl-5 text-right">
        <svg width="904" height="749" style="transform:translateY(-60px);width: 80%;height: 100%
                        ;" viewBox="0 0 904 749" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g id="hello" clip-path="url(#clip0)">
                <path id="Vector" d="M766.549 601.895C766.549 647.134 793.444 662.931 826.617 662.931C827.39 662.931 828.158 662.923 828.922 662.902C830.458 662.869 831.982 662.802 833.485 662.693C863.427 660.577 886.689 643.965 886.689 601.895C886.689 558.359 831.064 503.422 826.868 499.343L826.859 499.339C826.701 499.181 826.617 499.101 826.617 499.101C826.617 499.101 766.549 556.652 766.549 601.895Z" fill="#3F3D56" />
                <path id="Vector_2" d="M828.809 656.009L806.837 625.312L828.863 659.378L828.922 662.902C830.458 662.869 831.982 662.802 833.485 662.693L831.118 617.434L831.135 617.083L831.093 617.016L830.872 612.741L852.952 578.586L830.805 609.535L830.75 610.441L828.959 576.244L847.863 540.954L828.73 570.237L826.868 499.343L826.86 499.101V499.339L827.169 555.245L808.352 533.081L827.248 560.059L827.745 590.677L810.173 561.294L827.82 595.186L828.095 612.207L802.587 571.306L828.191 618.148L828.809 656.009Z" fill="#F2F2F2" />
                <g id="Group" opacity="0.7">
                    <path id="Vector_3" opacity="0.7" d="M69.8379 284.805V273.91H124.313V324.3C124.313 327.117 123.194 329.819 121.202 331.811C119.21 333.803 116.508 334.923 113.691 334.923H80.4606C77.6433 334.923 74.9414 333.803 72.9492 331.811C70.9571 329.819 69.8379 327.117 69.8379 324.3V313.132C66.0815 313.132 62.4789 311.64 59.8227 308.984C57.1665 306.328 55.6743 302.725 55.6743 298.969C55.6743 295.212 57.1665 291.61 59.8227 288.953C62.4789 286.297 66.0815 284.805 69.8379 284.805V284.805ZM69.8379 307.685V290.253C67.5262 290.253 65.3093 291.171 63.6747 292.805C62.0402 294.44 61.1218 296.657 61.1218 298.969C61.1218 301.28 62.0402 303.497 63.6747 305.132C65.3093 306.766 67.5262 307.685 69.8379 307.685V307.685Z" fill="url(#paint0_linear)" />
                </g>
                <path id="Vector_4" d="M71.5905 286.51C74.1482 286.51 76.6485 287.269 78.7751 288.69C80.9018 290.111 82.5593 292.13 83.5381 294.493C84.5169 296.856 84.773 299.457 84.274 301.965C83.775 304.474 82.5434 306.778 80.7348 308.587C78.9262 310.395 76.6219 311.627 74.1134 312.126C71.6048 312.625 69.0046 312.369 66.6416 311.39C64.2786 310.411 62.2589 308.754 60.8379 306.627C59.4169 304.5 58.6585 302 58.6585 299.442C58.6585 296.012 60.0209 292.723 62.4461 290.298C64.8714 287.873 68.1607 286.51 71.5905 286.51V286.51ZM71.5905 307.4C73.1645 307.4 74.7031 306.934 76.0118 306.059C77.3205 305.185 78.3405 303.942 78.9429 302.488C79.5452 301.034 79.7028 299.433 79.3957 297.89C79.0887 296.346 78.3307 294.928 77.2178 293.815C76.1048 292.702 74.6868 291.944 73.143 291.637C71.5993 291.33 69.9992 291.488 68.545 292.09C67.0909 292.692 65.8479 293.712 64.9735 295.021C64.099 296.33 63.6323 297.868 63.6323 299.442C63.6323 301.553 64.4707 303.577 65.9632 305.07C67.4556 306.562 69.4799 307.4 71.5905 307.4Z" fill="#00587A" />
                <path id="Vector_5" opacity="0.1" d="M71.5905 286.51C74.1482 286.51 76.6485 287.269 78.7751 288.69C80.9018 290.111 82.5593 292.13 83.5381 294.493C84.5169 296.856 84.773 299.457 84.274 301.965C83.775 304.474 82.5434 306.778 80.7348 308.587C78.9262 310.395 76.6219 311.627 74.1134 312.126C71.6048 312.625 69.0046 312.369 66.6416 311.39C64.2786 310.411 62.2589 308.754 60.8379 306.627C59.4169 304.5 58.6585 302 58.6585 299.442C58.6585 296.012 60.0209 292.723 62.4461 290.298C64.8714 287.873 68.1607 286.51 71.5905 286.51V286.51ZM71.5905 307.4C73.1645 307.4 74.7031 306.934 76.0118 306.059C77.3205 305.185 78.3405 303.942 78.9429 302.488C79.5452 301.034 79.7028 299.433 79.3957 297.89C79.0887 296.346 78.3307 294.928 77.2178 293.815C76.1048 292.702 74.6868 291.944 73.143 291.637C71.5993 291.33 69.9992 291.488 68.545 292.09C67.0909 292.692 65.8479 293.712 64.9735 295.021C64.099 296.33 63.6323 297.868 63.6323 299.442C63.6323 301.553 64.4707 303.577 65.9632 305.07C67.4556 306.562 69.4799 307.4 71.5905 307.4Z" fill="black" />
                <path id="Vector_6" d="M121.329 276.562H71.5905V322.52C71.5905 325.106 72.6177 327.585 74.4462 329.414C76.2747 331.242 78.7547 332.27 81.3405 332.27H111.579C114.165 332.27 116.645 331.242 118.473 329.414C120.302 327.585 121.329 325.106 121.329 322.52V276.562Z" fill="#00587A" />
                <path id="Vector_7" opacity="0.1" d="M80.5437 276.562V322.571C80.5437 325.143 81.5655 327.61 83.3845 329.429C85.2034 331.248 87.6703 332.27 90.2427 332.27H85.2688C82.6965 332.27 80.2295 331.248 78.4106 329.429C76.5917 327.61 75.5698 325.143 75.5698 322.571V276.562H80.5437Z" fill="black" />
                <path id="Vector_8" d="M111.514 239.481C111.939 239.494 112.357 239.601 112.736 239.794C113.116 239.987 113.448 240.261 113.71 240.596C114.363 241.779 113.181 243.112 112.102 243.925C110.108 245.427 108.008 246.901 106.653 248.997C105.298 251.093 104.872 254.017 106.353 256.026C108.287 258.648 112.901 259.212 113.347 262.44C113.634 264.512 111.843 266.28 110.028 267.32C105.547 269.887 99.7716 270.571 96.5264 274.587C95.1839 271.827 92.1811 270.231 89.1881 269.549C86.195 268.868 83.0852 268.919 80.0506 268.457C79.5549 268.447 79.0683 268.321 78.6303 268.089C78.1923 267.856 77.8152 267.524 77.5294 267.119C76.6811 265.398 79.0988 263.333 78.2644 261.605C77.6293 260.289 75.7635 260.391 74.4011 259.864C72.1826 259.007 71.2678 256.152 71.8975 253.858C72.5271 251.564 74.3056 249.772 76.1759 248.302C81.2162 244.342 87.2768 242.012 93.4068 240.337C96.2578 239.558 99.6045 238.336 102.566 238.218C105.424 238.104 108.685 238.997 111.514 239.481Z" fill="#EEEEEE" />
                <path id="Vector_9" d="M460.613 344.016L564.613 668.016" stroke="#E0E0E0" stroke-width="8" stroke-miterlimit="10" />
                <g id="Group_2" opacity="0.7">
                    <path id="Vector_10" opacity="0.7" d="M380.034 704.506C392.827 705.248 404.224 715.965 404.224 715.965L409.734 702.295L410.184 702.441C407.492 690.657 352.718 447.722 407.55 426.779C449.683 410.686 494.374 390.771 529.388 391.519V334.129H480.299V332.084H441.438C433.988 326.763 444.813 323.104 456.911 320.817C456.418 320.253 455.983 319.64 455.614 318.988L393.372 207.317C393.372 207.317 379.054 183.795 388.258 172.546C397.462 161.296 410.757 201.181 410.757 201.181L461.891 274.814C461.891 274.814 513.5 221.023 546.33 194.273C549.974 190.662 554.084 187.556 558.552 185.036C564.545 180.981 569.081 178.881 571.318 179.704C571.341 179.713 571.359 179.727 571.382 179.736C576.357 178.358 581.496 177.66 586.658 177.659H590.749V169.268C581.586 166.242 573.202 161.231 566.197 154.593C559.192 147.956 553.738 139.854 550.223 130.867C544.453 121.312 540.93 110.571 539.918 99.4548C538.907 88.3389 540.433 77.1384 544.383 66.6987C543.772 66.6266 543.185 66.4232 542.66 66.1025C540.808 64.9102 540.625 62.302 540.804 60.1066C541.476 52.7381 543.932 45.6441 547.961 39.438C551.99 33.232 557.47 28.1007 563.927 24.4877C569.108 21.6544 575.042 19.7022 578.863 15.1992C582.146 11.3299 583.526 5.91822 587.499 2.76113C592.219 -0.989543 599.037 -0.344755 604.829 1.32885C611.274 3.19365 617.38 6.07507 622.916 9.86441C629.181 14.1551 634.835 19.6675 642.047 22.0425C647.172 23.73 652.73 23.6963 657.887 25.2817C661.845 26.5358 665.454 28.6987 668.426 31.5975C671.398 34.4963 673.651 38.0505 675.004 41.9757C676.316 46.1926 676.813 50.6211 676.468 55.024C679.604 60.2664 682.072 65.8806 683.814 71.7358C684.2 71.9443 684.588 72.1482 684.97 72.3631L683.849 71.8589C687.76 85.0623 687.89 99.0982 684.224 112.372C680.557 125.645 673.241 137.624 663.107 146.948C655.099 157.373 644.141 165.15 631.656 169.268V179.419C640.563 181.34 649.061 184.82 656.756 189.699L656.767 189.686C656.767 189.686 657.42 190.089 658.537 190.841C658.649 190.916 658.761 190.992 658.873 191.067C666.44 196.203 691.798 214.971 690.942 235.25C690.975 236.03 690.971 236.812 690.929 237.596C692.313 243.457 693.014 249.458 693.017 255.48V402.649C693.037 418.911 687.572 434.704 677.506 447.475C698.847 452.259 712.448 459.493 712.448 467.589C712.341 468.267 712.341 468.957 712.448 469.635C712.448 484.037 669.408 495.713 616.316 495.713C609.897 495.713 603.627 495.541 597.559 495.215L537.57 543.779L633.702 698.204C633.702 698.204 665.405 722.749 640.861 730.93C616.316 739.112 566.205 745.248 566.205 745.248C566.205 745.248 558.023 730.93 569.273 724.794C580.522 718.658 595.863 721.726 595.863 721.726L593.817 709.454C593.817 709.454 427.12 566.278 461.891 517.19C468.543 507.798 475.196 498.108 481.905 488.569L455.664 490.961L449.692 715.718L448.945 715.474C450.444 719.89 461.047 753.214 437.546 747.575C412.388 741.538 366.613 720.243 366.613 720.243C366.613 720.243 367.242 703.765 380.034 704.506ZM480.299 317.766L529.388 303.515V261.519L476.034 318.156C478.658 317.893 480.299 317.766 480.299 317.766Z" fill="url(#paint1_linear)" />
                </g>
                <path id="Vector_11" d="M611.613 171.016C571.849 171.016 539.613 138.781 539.613 99.0161C539.613 59.2516 571.849 27.0161 611.613 27.0161C651.378 27.0161 683.613 59.2516 683.613 99.0161C683.613 138.781 651.378 171.016 611.613 171.016Z" fill="black" />
                <path id="Vector_12" d="M529.613 264.016L474.666 322.345C473.509 323.573 472.079 324.511 470.491 325.083C468.904 325.655 467.204 325.845 465.53 325.637C463.855 325.429 462.253 324.829 460.854 323.886C459.454 322.943 458.297 321.684 457.475 320.21L463.613 277.016C463.613 277.016 557.481 179.179 570.613 184.016C583.746 188.853 529.613 264.016 529.613 264.016Z" fill="#00587A" />
                <path id="Vector_13" d="M634.613 466.016L715.613 676.016" stroke="#BDBDBD" stroke-width="5" stroke-miterlimit="10" />
                <path id="Vector_14" d="M594.613 466.016L513.613 676.016" stroke="#BDBDBD" stroke-width="5" stroke-miterlimit="10" />
                <path id="Vector_15" d="M614.613 493.016C562.699 493.016 520.613 481.599 520.613 467.516C520.613 453.433 562.699 442.016 614.613 442.016C666.528 442.016 708.613 453.433 708.613 467.516C708.613 481.599 666.528 493.016 614.613 493.016Z" fill="#B84733" />
                <path id="Vector_16" d="M614.613 491.016C562.699 491.016 520.613 479.599 520.613 465.516C520.613 451.433 562.699 440.016 614.613 440.016C666.528 440.016 708.613 451.433 708.613 465.516C708.613 479.599 666.528 491.016 614.613 491.016Z" fill="#F55F44" />
                <path id="Vector_17" d="M654.167 512.154L565.477 539.484" stroke="#BDBDBD" stroke-width="5" stroke-miterlimit="10" />
                <path id="Vector_18" d="M575.059 512.154L663.75 539.484" stroke="#BDBDBD" stroke-width="5" stroke-miterlimit="10" />
                <path id="Vector_19" d="M613.519 182.016H585.613C570.761 182.016 556.517 187.916 546.015 198.418C535.513 208.92 529.613 223.164 529.613 238.016V386.016H689.613V258.111C689.613 237.929 681.596 218.574 667.326 204.304C653.055 190.033 633.7 182.016 613.519 182.016V182.016Z" fill="#00587A" />
                <path id="Vector_20" d="M689.613 386.016H529.613V473.016H618.613C637.444 473.016 655.503 465.536 668.818 452.221C682.133 438.906 689.613 420.846 689.613 402.016V386.016V386.016Z" fill="#39447A" />
                <path id="Vector_21" opacity="0.05" d="M687.452 242.055L589.613 335.016H481.613V321.016L574.613 294.016L654.167 195.776C654.167 195.776 690.291 218.095 687.452 242.055Z" fill="black" />
                <path id="Vector_22" d="M687.452 240.055L589.613 333.016H481.613V319.016L574.613 292.016L654.167 193.776C654.167 193.776 690.291 216.095 687.452 240.055Z" fill="#00587A" />
                <path id="Vector_23" d="M481.613 319.016C481.613 319.016 429.613 323.016 443.613 333.016H481.613V319.016Z" fill="#FDA57D" />
                <g id="hand">
                    <path id="Vector_24" d="M474.666 304L474.666 322.345C473.509 323.573 472.079 324.511 470.491 325.083C468.904 325.655 467.204 325.845 465.529 325.637C463.855 325.429 462.253 324.829 460.854 323.886C459.454 322.943 458.297 321.684 457.475 320.21L396.613 211.016L413.613 205.016L463.613 277.016C463.613 277.016 461.533 284.163 474.666 289C487.799 293.837 474.666 304 474.666 304Z" fill="#00587A" />
                    <path id="Vector_25" d="M413.613 205.016C413.613 205.016 400.613 166.016 391.613 177.016C382.613 188.016 396.613 211.016 396.613 211.016L413.613 205.016Z" fill="#FDA57D" />
                </g>
                <path id="Vector_26" opacity="0.05" d="M689.613 386.016V390.683L529.613 391.016V386.016H689.613Z" fill="black" />
                <path id="Vector_27" d="M565.151 478.561L457.524 488.369L451.685 708.141L413.154 695.597C413.154 695.597 355.527 446.599 410.477 425.61C465.427 404.622 524.826 376.985 560.289 399.508C595.753 422.032 565.151 478.561 565.151 478.561Z" fill="#39447A" />
                <path id="Vector_28" opacity="0.1" d="M558.613 411.016C558.613 411.016 499.613 441.016 491.613 475.016Z" fill="black" />
                <path id="Vector_29" d="M621.612 472.016L537.613 540.016L631.613 691.016L592.613 702.016C592.613 702.016 429.613 562.016 463.613 514.016C497.613 466.016 531.613 410.016 573.613 409.016C615.613 408.016 621.612 472.016 621.612 472.016Z" fill="#39447A" />
                <path id="Vector_30" opacity="0.05" d="M489.613 251.016L468.613 287.016L463.613 277.016L489.613 251.016Z" fill="black" />
                <path id="Vector_31" d="M631.613 691.016C631.613 691.016 662.613 715.016 638.613 723.016C614.613 731.016 565.613 737.016 565.613 737.016C565.613 737.016 557.613 723.016 568.613 717.016C579.613 711.016 594.613 714.016 594.613 714.016L592.613 702.016L631.613 691.016Z" fill="#333333" />
                <path id="Vector_32" d="M450.791 707.431C450.791 707.431 464.408 745.195 439.808 739.292C415.208 733.388 370.448 712.566 370.448 712.566C370.448 712.566 371.063 696.453 383.572 697.179C396.081 697.904 407.225 708.383 407.225 708.383L412.613 695.016L450.791 707.431Z" fill="#333333" />
                <path id="Vector_33" d="M609.613 147.016H609.613C620.659 147.016 629.613 155.97 629.613 167.016V187.016C629.613 198.062 620.659 207.016 609.613 207.016H609.613C598.568 207.016 589.613 198.062 589.613 187.016V167.016C589.613 155.97 598.568 147.016 609.613 147.016Z" fill="#FDA57D" />
                <path id="Vector_34" opacity="0.05" d="M609.613 149.016C614.918 149.016 620.005 151.123 623.755 154.874C627.506 158.625 629.613 163.712 629.613 169.016V175.811C616.622 180.084 602.604 180.084 589.613 175.811V169.016C589.613 163.712 591.72 158.625 595.471 154.874C599.222 151.123 604.309 149.016 609.613 149.016Z" fill="black" />
                <path id="Vector_35" d="M609.613 177.016C574.267 177.016 545.613 148.362 545.613 113.016C545.613 77.6699 574.267 49.0161 609.613 49.0161C644.96 49.0161 673.613 77.6699 673.613 113.016C673.613 148.362 644.96 177.016 609.613 177.016Z" fill="#FDA57D" />
                <path id="Vector_36" opacity="0.05" d="M673.613 110.112C673.613 110.112 657.613 114.235 648.613 96.0504C639.613 77.8655 632.613 67.9465 595.613 78.6921C558.613 89.4377 551.17 90.7487 549.392 80.5875C548.176 73.644 561.333 56.7784 569.787 46.7931C573.912 41.9219 580.642 39.0161 587.835 39.0161H629.613L654.613 50.5883L673.613 67.12L677.613 89.4377L673.613 110.112Z" fill="black" />
                <path id="Vector_37" d="M673.613 108.112C673.613 108.112 657.613 112.235 648.613 94.0504C639.613 75.8655 632.613 65.9465 595.613 76.6921C558.613 87.4377 551.17 88.7487 549.392 78.5875C548.176 71.644 561.333 54.7784 569.787 44.7931C573.912 39.9219 580.642 37.0161 587.835 37.0161H629.613L654.613 48.5883L673.613 65.12L677.613 87.4377L673.613 108.112Z" fill="black" />
                <path id="Vector_38" d="M667.113 121.016C663.523 121.016 660.613 115.196 660.613 108.016C660.613 100.836 663.523 95.0161 667.113 95.0161C670.703 95.0161 673.613 100.836 673.613 108.016C673.613 115.196 670.703 121.016 667.113 121.016Z" fill="#FDA57D" />
                <path id="Vector_39" d="M671.759 74.5654C673.242 66.1941 674.699 57.4036 671.999 49.3422C670.676 45.504 668.474 42.0287 665.567 39.1942C662.661 36.3596 659.132 34.2447 655.262 33.0184C650.219 31.4682 644.785 31.5011 639.774 29.851C632.721 27.5287 627.193 22.1386 621.067 17.943C615.653 14.2377 609.682 11.4202 603.38 9.59676C597.717 7.96025 591.05 7.32976 586.435 10.9973C582.55 14.0843 581.201 19.376 577.991 23.1595C574.255 27.5626 568.452 29.4715 563.386 32.242C557.072 35.7748 551.714 40.7923 547.774 46.8607C543.835 52.9291 541.433 59.8657 540.776 67.0708C540.601 69.2175 540.78 71.7679 542.591 72.9337C543.716 73.5059 544.984 73.7373 546.238 73.5995C571.817 73.2339 597.426 72.8668 622.9 70.5187C630.819 69.7887 638.753 68.8665 646.7 69.1675C658.999 69.647 671.009 73.0357 681.744 79.0555" fill="black" />
                <path id="Vector_40" d="M782.521 645.267H871.038C889.144 645.267 903.822 659.945 903.822 678.051V678.051C903.822 696.157 889.144 710.835 871.038 710.835H782.521C764.415 710.835 749.737 696.157 749.737 678.051C749.737 659.945 764.415 645.267 782.521 645.267Z" fill="#00587A" />
                <path id="Vector_41" d="M327.947 411.183C327.558 411.169 327.189 411.005 326.919 410.725C326.649 410.446 326.498 410.072 326.498 409.683C326.498 409.294 326.649 408.92 326.919 408.64C327.189 408.36 327.558 408.196 327.947 408.183C328.335 408.196 328.704 408.36 328.974 408.64C329.244 408.92 329.396 409.294 329.396 409.683C329.396 410.072 329.244 410.446 328.974 410.725C328.704 411.005 328.335 411.169 327.947 411.183Z" fill="url(#paint2_linear)" />
                <path id="Vector_42" d="M107.851 344.016L3.85107 714.108" stroke="#E0E0E0" stroke-width="8" stroke-miterlimit="10" />
                <path id="Vector_43" d="M3.42896 333.178H565.035V355.063H3.42896V333.178Z" fill="#E0E0E0" />
                <path id="Vector_44" d="M341.113 328.016H420.113C423.703 328.016 426.613 330.926 426.613 334.516V334.516C426.613 338.106 423.703 341.016 420.113 341.016H341.113C337.523 341.016 334.613 338.106 334.613 334.516C334.613 330.926 337.523 328.016 341.113 328.016Z" fill="#535461" />
                <g id="Group_3" opacity="0.7">
                    <path id="Vector_45" opacity="0.7" d="M170.173 183.077H342.394C357.979 183.077 370.613 195.711 370.613 211.296V312.959C370.613 328.544 357.979 341.178 342.394 341.178H170.173C154.588 341.178 141.954 328.544 141.954 312.959V211.296C141.954 195.711 154.588 183.077 170.173 183.077Z" fill="url(#paint3_linear)" />
                </g>
                <path id="Vector_46" d="M176.763 185.994H339.702C354.522 185.994 366.537 198.008 366.537 212.829V314.343C366.537 329.164 354.522 341.178 339.702 341.178H176.763C161.942 341.178 149.928 329.164 149.928 314.343V212.829C149.928 198.008 161.942 185.994 176.763 185.994Z" fill="#3E3F49" />
                <path id="Vector_47" d="M173.763 185.994H336.702C351.522 185.994 363.537 198.008 363.537 212.829V314.343C363.537 329.164 351.522 341.178 336.702 341.178H173.763C158.942 341.178 146.928 329.164 146.928 314.343V212.829C146.928 198.008 158.942 185.994 173.763 185.994Z" fill="#535461" />
                <path id="Vector_48" d="M245.113 269.516C241.247 269.516 238.113 266.382 238.113 262.516C238.113 258.65 241.247 255.516 245.113 255.516C248.979 255.516 252.113 258.65 252.113 262.516C252.113 266.382 248.979 269.516 245.113 269.516Z" fill="#E0E0E0" />
            </g>
            <defs>
                <linearGradient id="paint0_linear" x1="89.9939" y1="334.923" x2="89.9939" y2="273.91" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#808080" stop-opacity="0.25" />
                    <stop offset="0.53514" stop-color="#808080" stop-opacity="0.12" />
                    <stop offset="1" stop-color="#808080" stop-opacity="0.1" />
                </linearGradient>
                <linearGradient id="paint1_linear" x1="-177080" y1="616610" x2="-177080" y2="56783.9" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#808080" stop-opacity="0.25" />
                    <stop offset="0.53514" stop-color="#808080" stop-opacity="0.12" />
                    <stop offset="1" stop-color="#808080" stop-opacity="0.1" />
                </linearGradient>
                <linearGradient id="paint2_linear" x1="-1773.54" y1="1869.41" x2="-1773.54" y2="1860.41" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#808080" stop-opacity="0.25" />
                    <stop offset="0.53514" stop-color="#808080" stop-opacity="0.12" />
                    <stop offset="1" stop-color="#808080" stop-opacity="0.1" />
                </linearGradient>
                <linearGradient id="paint3_linear" x1="-147695" y1="54123.8" x2="-147695" y2="29127.8" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#808080" stop-opacity="0.25" />
                    <stop offset="0.53514" stop-color="#808080" stop-opacity="0.12" />
                    <stop offset="1" stop-color="#808080" stop-opacity="0.1" />
                </linearGradient>
                <clipPath id="clip0">
                    <rect width="903.822" height="748.215" fill="white" transform="matrix(-1 0 0 1 903.822 0)" />
                </clipPath>
            </defs>
        </svg>

    </div>
</div>
<h4 class="title mt-5 Mylaporan ">Laporan saya </h4>
<div class="row mb-5 mx-0" id="myLaporan">
</div>
<div>
    <ul id="links" class="p-0"></ul>
</div>
<div class="form-panel mt-5 d-none">
    <h2 class="p-2 col title text-center text-light text-25 bg-darkGreen radius-10">Form pengaduan
        masyarakat</h2>
    <div class="row mx-0">
        <div class="col-12 p-0 mt-3 ">
            <div class="form-lapor">
                <form action="{{url('/lapor')}}" method="POST" class="form-lapor" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="nik" value="{{Auth::user()->nik}}">

                    <div class="form-group mt-4">
                        <label for="judul">
                            <h4 class="title text-20">Judul Laporan</h4>
                        </label>
                        <input type="text" class="form-control form-control-lg radius-10 text" name="judul" id="judul">
                    </div>
                    <div class="form-group mt-4">
                        <label for="tanggal">
                            <h4 class="title text-20">Tanggal Peristiwa</h4>
                        </label>
                        <input type="date" class="form-control form-control-lg radius-10 text" name="tanggal" id="tanggal">
                    </div>
                    <div class="form-group mt-4">
                        <label for="isi">
                            <h4 class="title text-20">Isi Laporan</h4>
                        </label>
                        <textarea name="isi" class="form-control form-control-lg radius-10 text" id="isi" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group mt-4">
                        <label for="wilayah">
                            <h4 class="title text-20">wilayah</h4>
                        </label>
                        <input type="text" name="wilayah" class="w-100 form-control form-control-lg radius-10 text" id="wilayah">
                    </div>

                    <div class="form-group mt-4">
                        <label for="category">
                            <h4 class="title text-20" id="kategori_">kategori</h4>
                        </label>
                        <select class="form-control form-control-lg text radius-10" id="category" name="kategori">
                            <option value="" disabled selected id="defautlSelect">Pilih Kategori</option>
                            <option value="Kesehatan">Kesehatan</option>
                            <option value="Pendidikan">Pendidikan</option>
                            <option value="Agama">Agama</option>
                            <option value="Bullying">Bullying</option>
                            <option value="Budaya">Budaya</option>
                            <option value="Corona virus">Corona virus</option>
                            <option value="Pelayanan masyarakat">Pelayanan masyarakat</option>
                            <option value="Ketertiban">Ketertiban</option>
                            <option value="Social Media">Social Media</option>
                            <option value="Ketenagakerjaan">Ketenagakerjaan</option>
                            <option value="Sumber Daya Alam">Sumber Daya Alam</option>
                            <option value="Keuangan">Keuangan</option>
                            <option value="Pariwisata">Pariwisata</option>
                            <option value="Perlindungan Anak">Perlindungan Anak</option>
                            <option value="Pembangunan">Pembangunan</option>
                            <option value="Bencana Alam">Bencana Alam</option>
                            <option value="Demo">Demo</option>
                            <option value="Perdagangan">Perdagangan</option>
                            <option value="Hiburan">Hiburan</option>
                        </select>
                    </div>
                    <div class="d-flex">
                        <div class="form-group  ml-auto pt-2 pb-1 px-3 radius-10">
                            <input class="text mr-3 d-none" type="file" id="lampiran" name="lampiran">
                        </div>
                    </div>
                    <div class="border-dashed bg-light-hover py-2 text-center radius-10" id="btn-lampiran" style="align-items: center;">
                        <div class=" d-flex justify-content-center">
                            <h5 class="title mb-0 mr-3 mt-2">Lampirkan Foto</h5>
                            <div style="width: 40px; height:40px;line-height:40px" class="text-center bg-darkGreen rounded-circle">
                                <i class="fas fa-fw fa-paperclip"></i>
                            </div>
                        </div>
                        <div class="w-100 d-flex justify-content-center " id="result-img">

                        </div>
                    </div>
                    <button class="btn text-light w-100 mb-4 mt-3 radius-10 bg-darkGreen text-20 title" type="button" onclick="createLaporan()" id="btnLapor">Lapor <i class="fas fa-paper-plane"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modalLaporan" data-lampiran="{{ url('/img/lampiran') }}" data-user="{{Auth::user()->nik}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content position-relative">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Detail Laporan</h5>
            </div>
            <div class="modal-body" id="modalBodyDetail">

            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn position-absolute radius-20 px-4 bg-darkBlue text-light title" style="bottom: -20px;" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalShowTanggapan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content radius-20 position-relative">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tanggapan</h5>
            </div>
            <div class="modal-body p-4">
                <div class="w-100 radius-10 p-3" id="tanggapanIsi" style="background-color: #ecedf0;"></div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn position-absolute radius-20 px-4 bg-darkBlue text-light title" style="bottom: -20px;" data-dismiss="modal">Close </button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $('.lapor').addClass('active')
    $('#loader').removeClass('d-none')
    getMyLaporan('{{Auth::user()->nik}}')
    $('#addLaporan').on('click', function() {
        $('.form-panel').addClass('d-block')
        $('#myLaporan').addClass('d-none')
        $(this).addClass('d-none')
        $('#btn-cancel').addClass('d-block')
        $('.Mylaporan').hide()
        $('#links').hide()
    })
    $('#btn-cancel').on('click', function() {
        resetData()
        $('option').removeAttr('selected')
        $('#defautlSelect').attr('selected', 'selected')
        $('span').remove('.invalid-feedback');
        $('input , select').removeClass('is-invalid');
        $('.form-panel').removeClass('d-block')
        $('#myLaporan').removeClass('d-none')
        $(this).removeClass('d-block')
        $('#addLaporan').removeClass('d-none')
        $('#myLaporan').html('')
        $('.Mylaporan').show()
        $('#loader').removeClass('d-none')
        $('#result-img img').attr('src', '')
        getMyLaporan('{{Auth::user()->nik}}')
        $('#links').show()
        $('#result-img').html('')
    })
</script>

@endsection