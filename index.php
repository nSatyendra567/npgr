<?php include 'partials/header.php' ?>

<main class="w-full h-fit">
    <div class="overflow-x-hidden flex justify-center">
        <div class="swiper bannerSwiper w-full flex justify-center items-center relative max-h-[70vh] md:max-h-[450px]">
            <div class="swiper-wrapper">
                <figure class="swiper-slide h-auto rounded-lg shadow-md bg-white flex flex-col text-brown gap-5">
                    <picture>
                        <!-- Mobile image -->
                        <source media="(max-width: 767px)" srcset="./images/mobile-image.png" />
                        <!-- Desktop image -->
                        <img class="w-full h-full object-cover" src="./images/banner1.png" alt="NPGRC" />
                    </picture>
                </figure>
                <figure class="swiper-slide h-auto rounded-lg shadow-md bg-white flex flex-col text-brown gap-5">
                    <picture>
                        <!-- Mobile image -->
                        <source media="(max-width: 767px)" srcset="./images/mobile-image1.png" />
                        <!-- Desktop image -->
                        <img class="w-full h-full object-cover" src="./images/banner2.png" alt="NPGRC" />
                    </picture>
                </figure>
                <figure class="swiper-slide h-auto rounded-lg shadow-md bg-white flex flex-col text-brown gap-5">
                    <picture>
                        <!-- Mobile image -->
                        <source media="(max-width: 767px)" srcset="./images/mobile-image2.png" />
                        <!-- Desktop image -->
                        <img class="w-full h-full object-cover" src="./images/banner3.png" alt="NPGRC" />
                    </picture>
                </figure>
            </div>
            <div class="swiper-button-next custom-swiper-button-next bg-light-blue w-10 h-10 flex justify-center items-center rounded-full absolute right-2 md:right-4"></div>
            <div class="swiper-button-prev custom-swiper-button-prev bg-light-blue w-10 h-10 flex justify-center items-center rounded-full absolute left-2 md:left-4"></div>
        </div>
    </div>

    <section class="max-w-7xl mx-auto w-full gap-10 py-16 px-4">
        <!-- <h3 class="text-2xl md:text-3xl font-semibold text-center mb-5">Investigation Department</h3> -->
        <div class="flex flex-col md:flex-row items-center justify-center max-w-7xl mx-auto w-full gap-10">
            <!-- Swiper Section -->
            <!-- <figure class="md:w-2/5 w-full flex flex-col items-center">
                <img class="w-4/5 h-[350px] object-cover rounded-full" src="./images/judge-praveen.jpg" alt="NPGRC" />
                <p class="text-lg text-center text-blue font-bold mt-3">Hon'ble Judge</p>
                <p class="text-lg text-center text-blue font-bold mb-3">Mr. Praveen Shah</p>
                <p class="text-center bg-yellow text-white rounded-md px-8 py-2 font-semibold">Patron-in-Chief</p>
            </figure> -->
            <!-- <div class="carousel-container relative md:w-1/5 w-full flex flex-col items-center overflow-hidden">
    <div class="carousel-wrapper flex transition-transform duration-500 ease-in-out">
        <figure class="md:w-36 md:h-36 w-full carousel-item flex-shrink-0 flex flex-col items-center">
            <img class="w-4/5 h-[250px] object-cover rounded-full" src="./images/judge-praveen.jpg" alt="NPGRC" />
            <p class="text-lg text-center text-blue font-bold mt-3">Hon'ble Judge</p>
            <p class="text-lg text-center text-blue font-bold mb-3">Mr. Praveen Shah (Retd.)</p>
            <p class="text-center bg-yellow text-white rounded-md px-8 py-2 font-semibold">Patron-in-Chief</p>
        </figure>
        <figure class="md:w-36 md:h-36 w-full carousel-item flex-shrink-0 flex flex-col items-center">
            <img class="w-4/5 h-[250px] object-cover rounded-full" src="./images/Rony.jpg" alt="NPGRC" />
            <p class="text-lg text-center text-blue font-bold mt-3">Rony VP Advocate</p>
            <p class="text-lg text-center text-blue font-bold mb-3">High Court Of Delhi</p>
            <p class="text-center bg-yellow text-white rounded-md px-8 py-2 font-semibold">Chairman</p>
        </figure>
    </div>
    <button class="text-[#007aff] carousel-button-prev absolute left-2 md:left-4 bg-light-blue w-10 h-10 flex justify-center items-center rounded-full top-1/2 transform -translate-y-1/2">&#9664;</button>
    <button class="text-[#007aff] carousel-button-next absolute right-2 md:right-4 bg-light-blue w-10 h-10 flex justify-center items-center rounded-full top-1/2 transform -translate-y-1/2">&#9654;</button>
</div> -->

<div class="carousel-container flex flex-col items-center overflow-hidden w-full md:w-2/5 relative">
    <div class="carousel-wrapper flex transition-transform duration-500 ease-in-out">
        <div class="carousel-item w-full flex-shrink-0">
            <div class="flex flex-col items-center w-full">
                <figure class="md:w-36 md:h-36 w-full flex flex-col items-center">
                    <img class="md:w-4/5 sm:w-2/5 w-4/12 md:h-[150px] h-[250px] object-cover rounded-full" src="./images/judge-praveen.jpg" alt="NPGRC" />
                </figure>
                <p class="text-lg text-center text-blue font-bold mt-3">Hon'ble Judge</p>
                <p class="text-lg text-center text-blue font-bold mb-3">Mr. Praveen Shah (Retd.)</p><br>
                <p class="text-center bg-yellow text-white rounded-md px-8 py-2 font-semibold">Patron-in-Chief</p>
            </div>
        </div>
        <div class="carousel-item w-full flex-shrink-0">
            <div class="flex flex-col items-center w-full">
                <figure class="md:w-36 md:h-36 w-full flex flex-col items-center">
                    <img class="md:w-4/5 sm:w-2/5 w-/12 h-[250px] object-cover rounded-full" src="./images/Rony.jpg" alt="NPGRC" />
                </figure>
                <p class="text-lg text-center text-blue font-bold mt-3">Rony VP Advocate</p>
                <p class="text-lg text-center text-blue font-bold mb-3">High Court Of Delhi</p><br>
                <p class="text-center bg-yellow text-white rounded-md px-8 py-2 font-semibold">Chairman</p>
            </div>
        </div>
        <div class="carousel-item w-full flex-shrink-0">
            <div class="flex flex-col items-center w-full">
                <figure class="md:w-36 md:h-36 w-full flex flex-col items-center">
                    <img class="md:w-4/5 sm:w-2/5 w-4/12 md:h-[150px] h-[250px] object-cover rounded-full" src="./images/judge-nazir.jpg" alt="NPGRC" />
                </figure>
                <p class="text-lg text-center text-blue font-bold mt-3">Hon'ble Justice</p>
                <p class="text-lg text-center text-blue font-bold mb-3">Mr. Mohammad Nazir Fida <br>(Retd.)</p>
                <p class="text-center bg-yellow text-white rounded-md px-8 py-2 font-semibold">Executive Member</p>
            </div>
        </div>
        <div class="carousel-item w-full flex-shrink-0">
            <div class="flex flex-col items-center w-full">
                <figure class="md:w-36 md:h-36 w-full flex flex-col items-center">
                    <img class="md:w-4/5 sm:w-2/5 w-4/12 h-[250px] object-cover rounded-full" src="./images/judge-birinder.jpg" alt="NPGRC" />
                </figure>
                <p class="text-lg text-center text-blue font-bold mt-3">Hon'ble Judge</p>
                <p class="text-lg text-center text-blue font-bold mb-3">Mr. Birinder Singh (Retd.)</p><br>
                <p class="text-center bg-yellow text-white rounded-md px-8 py-2 font-semibold">Member - Secretary</p>
            </div>
        </div>
    </div>
    <button class="text-[#007aff] opacity-15 carousel-button-prev absolute left-2 md:left-4 bg-light-blue w-10 h-10 flex justify-center items-center rounded-full top-1/2 transform -translate-y-1/2">&#9664;</button>
    <button class="text-[#007aff] opacity-15 carousel-button-next absolute right-2 md:right-4 bg-light-blue w-10 h-10 flex justify-center items-center rounded-full top-1/2 transform -translate-y-1/2">&#9654;</button>
</div>


    <!-- <div class="swiper mySwiper">
    <div class="swiper-wrapper">
      <div class="swiper-slide">Slide 1</div>
      <div class="swiper-slide">Slide 2</div>
      <div class="swiper-slide">Slide 3</div>
      <div class="swiper-slide">Slide 4</div>
      <div class="swiper-slide">Slide 5</div>
      <div class="swiper-slide">Slide 6</div>
      <div class="swiper-slide">Slide 7</div>
      <div class="swiper-slide">Slide 8</div>
      <div class="swiper-slide">Slide 9</div>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
  </div> -->

            <!-- Center Image -->
            <div class="w-full md:w-1/5 md:h-[350px] flex items-center">
            <figure class="w-full flex justify-center">
                <img class="w-full h-[100px] object-contain" src="./images/center.png" alt="NPGRC" />
            </figure>
            </div>

            <!-- Right Image -->
            <div class="flex flex-col items-center w-full md:w-2/5">
                 <figure class="md:w-36 md:h-36 w-full flex flex-col items-center">
                     <img class="md:w-4/5 sm:w-2/5 w-3/5 h-[250px] object-cover rounded-full" src="./images/lizo-square.jpg" alt="NPGRC" />
                </figure>
                <p class="text-lg text-center text-blue font-bold mt-3">Dr. Lijo Kuriydath</p>
                <p class="text-lg text-center text-blue font-bold mb-3">Director General</p><br>
                <a href="https://gofindy.com/drlijokuriyadath" target="_blank" class="text-center bg-yellow text-white rounded-md px-8 py-2 font-semibold">Connect with DG</a>
             </div>
        </div>
    </section>


    <div class="max-w-7xl mx-auto w-full flex flex-col gap-5 px-5 sm:px-10">
        <h2 class="text-2xl md:text-3xl font-semibold text-center">About NPGRC</h2>
        <p class="text-base md:text-lg leading-relaxed md:text-justify">
        The NPGRC is a National-level is an online platform available for the citizens 24x7 to lodge their grievances to the public authorities on any subject .based on web technology, operational under the proceedings of various laws in India.the commission holds jurisdiction over grievances spanning both public and private sectors. Led by Honorable Judge Mr. Birendra Singh as Member/Secretary, the NPGRC ensures thorough and impartial resolution of issues, upholding legal standards and promoting justice.
        </p>
        <p class="text-base md:text-lg leading-relaxed md:text-justify">
            The NPGRC operates within a comprehensive legal framework that includes key legislative acts crucial to its mandate. The Human Rights Act empowers the commission to investigate complaints related to violations of fundamental rights. Under the Child Welfare Act, the NPGRC intervenes in matters concerning the welfare and rights of children, ensuring their protection and well-being. The Women's Rights Act enables the commission to address grievances related to gender-based discrimination, harassment, and violence. Additionally, the Environmental Protection Act grants authority to investigate complaints regarding environmental degradation, pollution, and non-compliance with environmental regulations. These acts provide the NPGRC with the legal tools necessary to address a wide array of issues affecting public and private sectors.
        </p>
        <a style="background-color: rgb(234 179 8);" class="bg-yellow-500 text-center rounded-md px-8 py-2 text-white self-start font-semibold text-lg mt-3 block mx-auto md:mx-0" href="<?php ROOT_URL ?>about.php">Know More</a>
    </div>




    <section class="py-10 md:py-16 px-5 sm:px-10 md:px-16 lg:px-32">
        <h3 class="text-2xl md:text-3xl font-semibold mb-5 text-center">Our Process</h3>
        <div class="flex flex-col gap-5 max-w-7xl mx-auto px-4 md:px-0">
            <p class="text-base md:text-lg leading-relaxed md:text-justify">
                We have strong policies and procedures to follow. Key areas of case investigation including case management, responding to a case scene, interviewing, statement taking, gathering evidence, search warrants, and file presentation. The process of investigation or the investigative process is a series of activities or steps that include gathering evidence, analysing information, developing and validating theories, forming reasonable grounds to believe, and finally arresting and charging a suspect.
            </p>
        </div>
        <div class="max-w-7xl mx-auto w-full mt-20">
            <h3 class="text-3xl font-bold text-center mb-10 animate-color-change animate-heading">Important Government Website</h3>
            <div class="flex flex-wrap gap-5 items-center justify-center max-w-5xl mx-auto">
            <div class="md:w-56 md:h-56 h-[12rem] w-[12rem] flex flex-col items-center justify-center gap-3 hover:border-blue group transition-all duration-200 cursor-pointer">
                <div class="flex items-center justify-center h-full w-full">
                    <img class="max-h-full" src="./images/sci.png" alt="Supreme Court of India">
                </div>
                <a target="_blank" class="py-2 px-3 h-fit rounded hover:bg-yellow bg-blue text-white text-lg text-center transition-all duration-200" href="https://www.sci.gov.in/">Supreme Court of India</a>
            </div>
            <div class="md:w-56 md:h-56 h-[12rem] w-[12rem] flex flex-col items-center justify-center gap-3 hover:border-blue group transition-all duration-200 cursor-pointer">
                <div class="flex items-center justify-center h-full w-full">
                    <img class="max-h-full" src="./images/nhrc-logo.png" alt="National Human Rights Commission">
                </div>
                <a target="_blank" class="py-2 px-3 h-fit rounded hover:bg-yellow bg-blue text-white text-lg text-center transition-all duration-200" href="https://nhrc.nic.in/">National Human Rights Commission</a>
            </div>
            <div class="md:w-56 md:h-56 h-[12rem] w-[12rem] flex flex-col items-center justify-center gap-3 hover:border-blue group transition-all duration-200 cursor-pointer">
                <div class="flex items-center justify-center h-full w-full">
                    <img class="max-h-full" src="./images/mha.png" alt="Ministry of Home Affairs">
                </div>
                <a target="_blank" class="py-2 px-3 h-fit rounded hover:bg-yellow bg-blue text-white text-lg text-center transition-all duration-200" href="https://www.mha.gov.in/en">Ministry of Home Affairs</a>
            </div>
            <div class="md:w-56 md:h-56 h-[12rem] w-[12rem] flex flex-col items-center justify-center gap-3 hover:border-blue group transition-all duration-200 cursor-pointer">
                <div class="flex items-center justify-center h-full w-full">
                    <img class="max-h-full" src="https://lawmin.gov.in/sites/all/themes/landj/images/emblem-dark.png" alt="Ministry of Law & Justice">
                </div>
                <a target="_blank" class="py-2 px-3 h-fit rounded hover:bg-yellow bg-blue text-white text-lg text-center transition-all duration-200" href="https://lawmin.gov.in/">Ministry of Law & Justice</a>
            </div>
            <div class="md:w-56 md:h-56 h-[12rem] w-[12rem] flex flex-col items-center justify-center gap-3 hover:border-blue group transition-all duration-200 cursor-pointer">
                <div class="flex items-center justify-center h-full w-full">
                    <img class="max-h-full" src="./images/pmi.png" alt="Ministry of Home Affairs">
                </div>
                <a target="_blank" class="py-2 px-3 h-fit rounded hover:bg-yellow bg-blue text-white text-lg text-center transition-all duration-200" href="https://www.pmindia.gov.in/en">PMO, PM India</a>
            </div>
            <div class="md:w-56 md:h-56 h-[12rem] w-[12rem] flex flex-col items-center justify-center gap-3 hover:border-blue group transition-all duration-200 cursor-pointer">
                <div class="flex items-center justify-center h-full w-full">
                    <img class="max-h-full" src="https://delhihighcourt.nic.in/assets/front/images/logo.png" alt="Delhi HighCourt">
                </div>
                <a target="_blank" class="py-2 px-3 h-fit rounded hover:bg-yellow bg-blue text-white text-lg text-center transition-all duration-200" href="https://delhihighcourt.nic.in/">Delhi HighCourt</a>
            </div>
        </div>
        
        
    </section>
    <div class="max-w-7xl mx-auto w-full flex flex-col gap-5 px-5 mt-20 sm:px-10 mb-5">
        <h2 class="text-2xl md:text-3xl font-semibold text-center">Department of Public Relation & General investigation</h2>
        <p class="text-base md:text-lg leading-relaxed md:text-justify">
        An investigation is a thorough search for facts, especially those that are hidden or need to be sorted out in a complex situation. The goal of an investigation is usually to determine how or why something happened. Investigations are usually formal and official.
        </p>
        <p class="text-base md:text-lg leading-relaxed md:text-justify">
        The National Public Grievances & Redressal Commission (NPGRC) does have strong policies and procedures to follow. Key areas of case investigation including case management, responding to a case scene, interviewing, statement taking, gathering evidence, search warrants, and file presentation. The process of investigation or the investigative process is a series of activities or steps that include gathering evidence, analyzing information, developing and validating theories, forming reasonable grounds to believe, and finally arresting and charging a suspect.
        </p>
        <div class="max-w-7xl mx-auto w-full mt-20 mb-16">
            <h3 class="text-3xl font-bold text-center mb-10">The Seven Steps</h3>
            <div class="flex flex-wrap gap-5 items-center justify-center max-w-5xl mx-auto">
                <div class="md:w-56 md:h-56 sm:h-[12rem] sm:w-[12rem] h-[10rem] w-[10rem] rounded-full border-8 border-yellow flex flex-col items-center justify-center gap-3 hover:border-blue group transition-all duration-200 cursor-pointer">
                    <i class="fas fa-lock fa-2x text-yellow group-hover:text-blue transition-all duration-200"></i>
                    <h4 class="sm:text-[15px] text-[13px] group-hover:text-yellow transition-all duration-200 text-center">Securing the<br>Scene</h4>
                </div>
                <div class="md:w-56 md:h-56 sm:h-[12rem] sm:w-[12rem] h-[10rem] w-[10rem] rounded-full border-8 border-yellow flex flex-col items-center justify-center gap-3 hover:border-blue group transition-all duration-200 cursor-pointer">
                    <i class="fa-solid fa-users-between-lines fa-2x text-yellow group-hover:text-blue transition-all duration-200"></i>
                    <h4 class="sm:text-[15px] text-[13px] group-hover:text-yellow transition-all duration-200 text-center">Separating the<br>Witnesses</h4>
                </div>
                <div class="md:w-56 md:h-56 sm:h-[12rem] sm:w-[12rem] h-[10rem] w-[10rem] rounded-full border-8 border-yellow flex flex-col items-center justify-center gap-3 hover:border-blue group transition-all duration-200 cursor-pointer">
                    <i class="fa-solid fa-user-secret fa-2x text-yellow group-hover:text-blue transition-all duration-200"></i>
                    <h4 class="sm:text-[15px] text-[13px] group-hover:text-yellow transition-all duration-200 text-center">Scanning the<br>Scene</h4>
                </div>
                <div class="md:w-56 md:h-56 sm:h-[12rem] sm:w-[12rem] h-[10rem] w-[10rem] rounded-full border-8 border-yellow flex flex-col items-center justify-center gap-3 hover:border-blue group transition-all duration-200 cursor-pointer">
                    <i class="fa-solid fa-eye fa-2x text-yellow group-hover:text-blue transition-all duration-200"></i>
                    <h4 class="sm:text-[15px] text-[13px] group-hover:text-yellow transition-all duration-200 text-center">Seeing the<br>Scene</h4>
                </div>
                <div class="md:w-56 md:h-56 sm:h-[12rem] sm:w-[12rem] h-[10rem] w-[10rem] rounded-full border-8 border-yellow flex flex-col items-center justify-center gap-3 hover:border-blue group transition-all duration-200 cursor-pointer">
                    <i class="fa-solid fa-user-pen fa-2x text-yellow group-hover:text-blue transition-all duration-200"></i>
                    <h4 class="sm:text-[15px] text-[13px] group-hover:text-yellow transition-all duration-200 text-center">Sketching the<br>Scene</h4>
                </div>
                <div class="md:w-56 md:h-56 sm:h-[12rem] sm:w-[12rem] h-[10rem] w-[10rem] rounded-full border-8 border-yellow flex flex-col items-center justify-center gap-3 hover:border-blue group transition-all duration-200 cursor-pointer">
                    <i class="fa-brands fa-searchengin fa-2x text-yellow group-hover:text-blue transition-all duration-200"></i>
                    <h4 class="sm:text-[15px] text-[13px] group-hover:text-yellow transition-all duration-200 text-center">Searching for<br>Evidence</h4>
                </div>
                <div class="md:w-56 md:h-56 sm:h-[12rem] sm:w-[12rem] h-[10rem] w-[10rem] rounded-full border-8 border-yellow flex flex-col items-center justify-center gap-3 hover:border-blue group transition-all duration-200 cursor-pointer">
                    <i class="fa-solid fa-user-shield fa-2x text-yellow group-hover:text-blue transition-all duration-200"></i>
                    <h4 class="sm:text-[15px] text-[13px] group-hover:text-yellow transition-all duration-200 text-center">Securing and<br>Collecting<br>Evidence</h4>
                </div>
            </div>
        </div>
        <p class="text-base md:text-lg leading-relaxed md:text-justify">
        Remembering, Hans Gustav Adolf Gross (26 December 1847 - 9 December 1915) was an Austrian criminal jurist and criminologist, the "Founding Father" of criminal profiling. 
        </p>
        <p class="text-base md:text-lg leading-relaxed md:text-justify text-center mx-auto font-bold">
        "A criminal is not born; he is made so when he is not corrected at the right time."
        </p>
        <p class="text-base md:text-lg leading-relaxed md:text-justify">
        With NPGRC, we are following a different investigating style than India's other investigating departments like IB, Special branch, State Police, etc. When you decide to forward a case to NPGRC, email the details with request letter to <span class="text-purple-700 font-bold"><a href="mailto:complaint@npgrcommission.in">complaint@npgrcommission.in</a></span> and then the same will be forwarded into NPGRC Legal department. The forwarded case file from Legal department after the investigation by Investigation department will be submitted into the NPGRC Chief Judge for commission's judgement.
        </p>
    </div>


</main>
<?php include 'partials/logos.php' ?>
<?php include 'partials/footer.php' ?>