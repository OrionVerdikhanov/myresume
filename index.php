<?php /* --------- WOW-CV 7.0 · (с) F. Verdikhanov --------- */ ?>
<!DOCTYPE html><html lang="ru" class="scroll-smooth">
<head>
<meta charset="utf-8">
<title>Вердиханов Фейтулла • Digital CV</title>

<!-- ======  ШРИФТЫ  ====== -->
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">

<!-- ======  TAILWIND  (JIT CDN) ====== -->
<script src="https://cdn.tailwindcss.com?plugins=typography"></script>
<script>
tailwind.config = {
  darkMode: 'class',
  theme: {
    fontFamily: { sans: ['Manrope','ui-sans-serif','system-ui'] },
    extend: {
      colors: {
        primary : '#2563eb',
        accent  : '#7c3aed',
        dark    : '#0f172a',
        glass   : 'rgba(255,255,255,.12)'
      },
      animation: {
        blob: 'blob 20s linear infinite'
      },
      keyframes: {
        blob: {
          '0%,100%': { transform:'translate(0,0) scale(1)' },
          '25%'   : { transform:'translate(40px,-60px) scale(1.1)' },
          '50%'   : { transform:'translate(-30px,20px) scale(.9)' },
          '75%'   : { transform:'translate(-50px,-10px) scale(1.05)' }
        }
      }
    }
  }
};
</script>

<!-- ======  СТОРОННИЕ БИБЛИОТЕКИ  ====== -->
<link  href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.3/flowbite.min.css" rel="stylesheet">
<link  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
<link  href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/tsparticles@2"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.1.0/typed.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.7.3/vanilla-tilt.min.js"></script>

<meta name="viewport" content="width=device-width,initial-scale=1">
<style>
/* ------------  GLASS MORPHISM  ------------- */
.glass         { backdrop-filter: blur(14px) saturate(1.2); background: var(--glass); border: 1px solid rgba(255,255,255,.25); }
.dark .glass   { background: rgba(255,255,255,.07); }

/* ------------  КАСТОМНЫЙ КУРСОР ------------- */
#dot,#ring { position: fixed; top: 0; left: 0; pointer-events: none; z-index: 70; border-radius: 50%; }
#dot  { width: 8px; height: 8px; background:#fff; mix-blend-mode:difference; }
#ring { width:32px; height:32px; border:2px solid #fff; mix-blend-mode:difference; transition:.15s; }

/* ------------  TIMELINE EXPERIENCE --------- */
.timeline::before {
  content:'';
  position:absolute; left:50%; top:0; bottom:0;
  transform:translateX(-1px);
  width:2px; background:linear-gradient(to bottom,#2563eb 0%,#7c3aed 100%);
  opacity:.3;
}
.timeline-item { position:relative; width:48%; }
.timeline-item:nth-child(odd)  { left:0;  padding-right:4rem; text-align:right; }
.timeline-item:nth-child(even) { left:52%; padding-left:4rem; }
.timeline-item::before{
  content:''; position:absolute; top:0;
  width:10px; height:10px; background:#7c3aed; border-radius:50%;
  transform:translateX(-50%);
  left:100%;
}
.timeline-item:nth-child(even)::before{ left:0; transform:translateX(-50%); }

/* ------------  НАВЫКИ ------------- */
.skill-track  { background: rgba(0,0,0,.1); }
.dark .skill-track{ background: rgba(255,255,255,.15); }
.skill-bar    { background:linear-gradient(90deg,#2563eb,#7c3aed); }

/* ------------  МОДАЛЬНОЕ ОКНО ------------- */
.modal { display:none; }
.modal.open { display:flex; }

/* ------------  ПЕРЕМЕННАЯ ДЛЯ GLASS ------------- */
:root{ --glass:rgba(255,255,255,.12); }
</style>
</head>

<body class="bg-slate-50 text-slate-800 dark:bg-dark dark:text-slate-200 transition-colors selection:bg-accent/30">

<div id="dot"></div><div id="ring"></div>

<!-- =============  NAVIGATION  ============= -->
<nav id="navbar" class="fixed inset-x-0 top-0 z-50 bg-white/70 dark:bg-dark/70 backdrop-blur shadow-sm">
 <div class="max-w-screen-xl mx-auto flex items-center justify-between h-14 px-4">
  <a href="#hero" class="text-xl font-bold text-primary dark:text-accent whitespace-nowrap">F Verdikhanov</a>
  <div class="flex items-center gap-4">
   <button id="themeBtn" class="text-xl p-2 hover:rotate-12 transition"><i class="fa-solid fa-circle-half-stroke"></i></button>
   <button data-collapse-toggle="nav-menu" class="md:hidden p-2"><i class="fa fa-bars"></i></button>
  </div>
  <div id="nav-menu" class="hidden md:flex gap-6">
   <a href="#about">Обо мне</a><a href="#experience">Опыт</a><a href="#education">Образование</a>
   <a href="#skills">Навыки</a><a href="#awards">Достижения</a><a href="#contact">Контакты</a>
  </div>
 </div>
</nav>

<!-- =============  HERO  ============= -->
<header id="hero" class="relative min-h-screen flex items-center justify-center overflow-hidden">
 <!-- tsParticles контейнер -->
 <div id="tsparticles" class="absolute inset-0 -z-20"></div>
 <!-- fallback blobs -->
 <div class="absolute inset-0 -z-30 flex justify-center items-center">
  <div class="w-[60vw] h-[60vw] bg-accent opacity-40 rounded-full blur-3xl animate-blob"></div>
  <div class="w-[40vw] h-[40vw] bg-primary opacity-40 rounded-full blur-3xl animate-blob mix-blend-multiply"></div>
 </div>
 <!-- noise overlay -->
 <div class="absolute inset-0 -z-10 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-20"></div>

 <div class="text-center px-4">
  <!-- KPI COUNTERS -->
  <div class="flex flex-wrap justify-center gap-6 mb-6 text-sm font-medium" data-aos="fade-down">
   <div class="glass px-4 py-2 rounded-full shadow">
     <span class="counter text-primary text-xl font-bold" data-target="30">0</span><span class="text-primary"> %</span> эффективность закупок
   </div>
   <div class="glass px-4 py-2 rounded-full shadow">
     Победитель РНТК <span class="counter text-primary text-xl font-bold" data-target="2024">0</span>
   </div>
   <div class="glass px-4 py-2 rounded-full shadow">
     <span class="counter text-primary text-xl font-bold" data-target="2">0</span> × MBA • Digital-Transformer
   </div>
  </div>

  <h1 class="text-5xl md:text-7xl font-extrabold mb-4 leading-tight">
   Вердиханов <span class="text-transparent bg-clip-text bg-gradient-to-r from-accent to-primary">Фейтулла</span>
  </h1>
  <h2 class="text-xl md:text-2xl font-medium mb-6"><span id="typed" class="border-r pr-1"></span></h2>
  <p class="max-w-xl mx-auto mb-10">MBA-менеджер, digital-transformer и стратег-аналитик с доказанным ростом KPI.</p>

  <a id="magBtn" href="#contact"
     class="relative inline-block px-10 py-3 font-semibold text-white rounded-full bg-gradient-to-br from-primary to-accent shadow-lg overflow-hidden group">
    <span class="relative z-10">Связаться</span>
    <span class="absolute inset-0 bg-white/20 opacity-0 group-hover:opacity-100 transition"></span>
  </a>
 </div>
</header>

<!-- =============  ABOUT  ============= -->
<section id="about" class="py-24">
 <div class="max-w-screen-xl mx-auto grid md:grid-cols-2 gap-16 items-center px-4">
  <div class="mx-auto w-56 h-56 rounded-full overflow-hidden shadow-2xl ring-4 ring-accent/40" data-aos="zoom-in">
   <img src="profile.jpg" alt="Фото" class="object-cover w-full h-full">
  </div>

  <article class="prose dark:prose-invert max-w-none" data-aos="fade-left">
   <h3 class="text-3xl font-bold !mb-6">Обо мне</h3>
   <p>Менеджер-стратег с MBA и 3 годами опыта в нефтегазовой отрасли. Запускаю цифровизацию, оптимизирую закупки, ускоряю HR-процессы.</p>
   <div class="flex flex-wrap gap-3 my-6">
    <span class="px-3 py-1 bg-primary/10 text-primary rounded-full text-sm">IoT-проект 2024</span>
    <span class="px-3 py-1 bg-primary/10 text-primary rounded-full text-sm">CRM Supply Chain</span>
    <span class="px-3 py-1 bg-primary/10 text-primary rounded-full text-sm">–30 % простои</span>
   </div>
   <h4>Ключевые инициативы</h4>
   <ul>
    <li>CRM снабжения → прозрачность, рост эффективности закупок.</li>
    <li>Авто-подбор персонала → −25 % time-to-hire.</li>
    <li>Russiannetwork.ru — запуск собственного digital-продукта.</li>
    <li>Система контроля ТО оборудования → −30 % простои.</li>
   </ul>
  </article>
 </div>
</section>

<!-- =============  EXPERIENCE (TIMELINE)  ============= -->
<section id="experience" class="py-24 bg-slate-100 dark:bg-slate-800">
 <div class="max-w-screen-xl mx-auto px-4">
  <h3 class="text-3xl font-bold mb-12 text-center" data-aos="fade-up">Опыт работы — 3 года 1 месяц</h3>

  <div class="relative timeline">
   <?php
   $exp=[
    ['И. о. Главного специалиста МТР','НК «Роснефть» — «РН-Сервис»','03.2025 – 06.2025',
     ['Исполнял обязанности главного специалиста отдела.']],
    ['Ведущий специалист МТР','НК «Роснефть» — «РН-Сервис»','08.2023 – н.в.',
     ['Платформа контроля заявок → −30 % простои.',
      'Координация закупок и поставщиков.',
      'Ценовой анализ и оптимизация.',
      'Учёт МТР, склад.',
      'SAP-скрипты для эффективности.']],
    ['Ведущий инженер транспортной службы','НК «Роснефть»','03.2024 – 12.2024',
     ['Управление закупками транспорта.',
      'Заключение ключевых договоров.']],
    ['Менеджер по подбору персонала','НК «Роснефть»','12.2022 – 08.2023',
     ['Анализ рынка труда.',
      '−25 % время закрытия вакансии.']],
    ['Практикант HR','АО «Самотлорнефтегаз»','11.2021 – 12.2022',
     ['Подбор и адаптация сотрудников.',
      'Разработка соц-программ.']]
   ];
   foreach($exp as $i=>$e):
   ?>
   <div class="timeline-item mb-16">
     <div class="glass rounded-xl p-6 shadow-lg">
       <h4 class="text-lg font-semibold mb-1"><?= $e[0] ?></h4>
       <p class="text-xs opacity-70 mb-1"><?= $e[1] ?></p>
       <p class="text-xs opacity-70 italic mb-3"><?= $e[2] ?></p>
       <ul class="list-disc pl-4 space-y-1 text-sm leading-snug">
         <?php foreach($e[3] as $li) echo "<li>$li</li>"; ?>
       </ul>
     </div>
   </div>
   <?php endforeach;?>
  </div>
 </div>
</section>

<!-- =============  EDUCATION  ============= -->
<section id="education" class="py-24">
 <div class="max-w-screen-xl mx-auto px-4">
  <h3 class="text-3xl font-bold mb-12 text-center" data-aos="fade-up">Образование и повышение квалификации</h3>

  <div id="edu-acc" data-accordion="collapse" class="md:w-2/3 mx-auto">
   <h2>
    <button type="button" class="flex items-center justify-between w-full p-4 font-medium text-primary border border-primary rounded-lg"
            data-accordion-target="#edu-body" aria-expanded="true" aria-controls="edu-body">
     <span>Высшее образование & аспирантура</span><i class="fa fa-chevron-down rotate-180 shrink-0"></i>
    </button>
   </h2>
   <div id="edu-body" class="p-4 border border-t-0 border-primary rounded-b-lg">
    <ul class="list-disc pl-5 space-y-1 text-sm">
     <li><strong>2025</strong> — Eduson — Executive MBA (Квалификация Руководитель "Стратегическое управление предприятием")</li>
     <li><strong>2025</strong> — Eduson — MBA Expert (Квалификация Руководитель "Операционное управление")</li>   
     <li><strong>2025</strong> — НВГУ — Магистр стратегического менеджмента</li>
     <li><strong>2025</strong> — GeekBrains — Разработчик</li>
     <li><strong>2025</strong> — GeekBrains — Тестировщик</li>
     <li><strong>2025</strong> — GeekBrains — Product-manager IT</li>
     <li><strong>2024</strong> — МПИ — Юриспруденция</li>
     <li><strong>2023</strong> — НВГУ — Бакалавр менеджмента + ГМУ</li>
    </ul>
   </div>

   <h2 class="mt-6">
    <button type="button"
        class="flex items-center justify-between w-full p-4 font-medium text-primary border border-primary rounded-lg"
        data-accordion-target="#courses-body" aria-expanded="true" aria-controls="courses-body">
  <span>Курсы и повышение квалификации</span>
  <i class="fa fa-chevron-down rotate-180 shrink-0"></i>
</button>

<!-- Контент -->
<div id="courses-body" class="p-4 border border-t-0 border-primary rounded-b-lg">
  <ul class="list-disc pl-5 space-y-1 text-sm">
    <li>2024 — Навыки убеждающей презентации (32 ак/ч) — ФГБОУ ВО «Нижневартовский государственный университет»</li>
    <li>2024 — Управление командой (32 ак/ч) — ФГБОУ ВО «Нижневартовский государственный университет»</li>
    <li>2024 — Разработка и критерии управленческих решений (32 ак/ч) — ФГБОУ ВО «Нижневартовский государственный университет»</li>
    <li>2024 — Публичный имидж: как управлять впечатлениями (16 ак/ч) — ИП Гмыря М. В.</li>
    <li>2024 — Методы убеждающей презентации</li>
    <li>2023 — Switch-test «Анализ информации»</li>
  </ul>
</div>
  </div>
 </div>
</section>

<!-- =============  SKILLS  ============= -->
<section id="skills" class="py-24 bg-slate-100 dark:bg-slate-800">
 <div class="max-w-screen-xl mx-auto px-4">
  <h3 class="text-3xl font-bold mb-12 text-center" data-aos="fade-up">Навыки и компетенции</h3>

  <?php
  $skills = [
    ['SAP',80],['Проектный менеджмент',85],['Финансовый анализ',75],
    ['Закупки',90],['Переговоры',85],['Обучение персонала',70],
    ['Фондовый рынок',60],['Технический анализ',65],['Инвестиционный анализ',70],
    ['Продажи',75],['Управление командой',85]
  ];
  ?>

  <div class="space-y-6 md:w-3/4 lg:w-1/2 mx-auto" data-aos="zoom-in">
    <?php foreach($skills as $s): ?>
    <div>
      <div class="flex justify-between mb-1">
        <span class="font-medium"><?= $s[0] ?></span>
        <span class="text-xs"><?= $s[1] ?>%</span>
      </div>
      <div class="skill-track w-full h-2 rounded overflow-hidden">
        <div class="skill-bar h-2 w-0" data-skill="<?= $s[1] ?>"></div>
      </div>
    </div>
    <?php endforeach; ?>
  </div>

  <div class="mt-16 flex flex-col md:flex-row md:justify-center gap-8 text-center" data-aos="fade-up">
   <div><h4 class="font-semibold mb-1">Языки</h4>Русский — родной<br>Английский — A2</div>
   <div><h4 class="font-semibold mb-1">В/у</h4>B & C</div>
   <div><h4 class="font-semibold mb-1">Желаемая зарплата</h4><span class="text-xl font-bold">130 000 ₽</span></div>
  </div>
 </div>
</section>

<!-- =============  AWARDS & PROJECTS  ============= -->
<section id="awards" class="py-24">
 <div class="max-w-screen-xl mx-auto px-4">
  <h3 class="text-3xl font-bold mb-12 text-center" data-aos="fade-up">Достижения и проекты</h3>
  <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
   <?php
   $awards=[
     ['🥇','1-е место РНТК 2024','IoT-процессы'],
     ['🥈','2-е место РНТК 2023','IT-найм'],
     ['🏆','2-е место РНТК 2025','Инновационные технологии'],
     ['🥉','3-е место РНТК 2025','Труд / Юриспруденция / HR'],
     ['⚙️','CRM снабжения','–30 % простои'],
     ['🚀','Russiannetwork.ru','Социальная сеть']
   ];
   foreach($awards as $a):
   ?>
    <div class="glass p-6 rounded-2xl tilt text-center shadow-lg" data-aos="zoom-in">
     <span class="text-3xl"><?= $a[0] ?></span>
     <h4 class="font-semibold mt-2"><?= $a[1] ?></h4>
     <p><?= $a[2] ?></p>
    </div>
   <?php endforeach;?>
  </div>
 </div>
</section>

<!-- =============  CONTACT  ============= -->
<section id="contact" class="relative py-32 bg-gradient-to-br from-primary to-accent text-white text-center">
 <div class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-10"></div>
 <div class="relative z-10 max-w-xl mx-auto">
  <h3 class="text-4xl font-bold mb-8">Контакты</h3>
  <p class="text-xl mb-4"><i class="fa fa-phone mr-2"></i><a href="tel:+79527106769" class="underline">+7 952 710-67-69</a></p>
  <p class="text-xl mb-4"><i class="fa fa-envelope mr-2"></i><a href="mailto:verdikhanov01@bk.ru" class="underline">verdikhanov01@bk.ru</a></p>
  <p class="text-xl mb-8"><i class="fa-brands fa-vk mr-2"></i><a href="https://vk.com/feitulla" target="_blank" class="underline">vk.com/feitulla</a></p>
  <a href="Verdikhanov-CV.pdf" download class="inline-block px-8 py-3 bg-white/20 rounded-full backdrop-blur hover:bg-white/30">Скачать PDF</a>
  <p class="mt-10 text-sm opacity-75">Санкт-Петербург • Гражданство РФ • Готов к командировкам</p>

  <!-- кнопка открытия модального окна -->
  <button id="openRec" class="mt-12 px-8 py-3 bg-white/20 rounded-full backdrop-blur hover:bg-white/30">Оставить отзыв</button>
 </div>
</section>

<!-- =============  FOOTER  ============= -->
<footer class="py-6 bg-dark text-slate-300 text-center">
 <div class="flex justify-center gap-6 mb-3">
  <a href="https://vk.com/feitulla" target="_blank"><i class="fa-brands fa-vk text-xl hover:text-white"></i></a>
  <a href="mailto:verdikhanov01@bk.ru"><i class="fa fa-envelope text-xl hover:text-white"></i></a>
  <a href="tel:+79527106769"><i class="fa fa-phone text-xl hover:text-white"></i></a>
 </div>
 <small>&copy; <?=date('Y')?> Вердиханов Ф. Н.</small>
</footer>

<!-- =============  FEEDBACK MODAL  ============= -->
<div id="recModal" class="modal fixed inset-0 bg-black/60 items-center justify-center z-[60]">
 <div class="bg-white dark:bg-dark p-8 rounded-lg max-w-md w-full relative">
  <button id="closeRec" class="absolute top-3 right-3 text-slate-500 hover:text-slate-900 dark:hover:text-white"><i class="fa fa-xmark"></i></button>
  <h4 class="text-xl font-semibold mb-4">Ваш отзыв</h4>
  <textarea id="recText" rows="4" class="w-full p-2 border rounded dark:bg-slate-700"></textarea>
  <div class="mt-4 text-right">
    <button id="sendRec" class="bg-accent text-white px-4 py-2 rounded">Отправить</button>
  </div>
 </div>
</div>

<!-- =============  SCRIPTS  ============= -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.3/flowbite.min.js"></script>
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

<script>
document.addEventListener('DOMContentLoaded',()=>{

 /* ----------  AOS  ---------- */
 AOS.init({ duration:800, once:true });

 /* ----------  Typed.js  ---------- */
 new Typed('#typed', {
   strings:['Digital Transformer','Product Manager','Стратег-аналитик'],
   typeSpeed:60, backSpeed:30, loop:true
 });

 /* ----------  Dark mode toggle  ---------- */
 const root=document.documentElement, btn=document.getElementById('themeBtn');
 if(localStorage.theme==='dark'||(!('theme' in localStorage) && matchMedia('(prefers-color-scheme:dark)').matches))
   root.classList.add('dark');
 btn.onclick=()=>{ root.classList.toggle('dark');
   localStorage.theme = root.classList.contains('dark') ? 'dark' : 'light'; };

 /* ----------  Custom cursor  ---------- */
 const d=document.getElementById('dot'), r=document.getElementById('ring');
 window.addEventListener('mousemove',e=>{
   d.style.transform=`translate(${e.clientX}px,${e.clientY}px)`;
   r.style.transform=`translate(${e.clientX-16}px,${e.clientY-16}px)`;
 });

 /* ----------  Magnetic button (hero CTA)  ---------- */
 const m=document.getElementById('magBtn');
 m.addEventListener('mousemove',e=>{
   const rect=m.getBoundingClientRect(), x=e.clientX-rect.left, y=e.clientY-rect.top;
   gsap.to(m.querySelector('span'),{ x:(x-rect.width/2)/4, y:(y-rect.height/2)/4, duration:.3 });
 });
 m.addEventListener('mouseleave',()=>gsap.to(m.querySelector('span'),{ x:0, y:0, duration:.3 }));

 /* ----------  tsParticles background  ---------- */
 tsParticles.load("tsparticles",{
   fullScreen:{ enable:false },
   particles:{
     number:{ value:55, density:{ enable:true, area:800 } },
     color:{ value:'#ffffff' },
     opacity:{ value:0.15 },
     size:{ value:{ min:1, max:3 } },
     move:{ enable:true, speed:1, outModes:'bounce' },
     links:{ enable:true, opacity:0.1, distance:120 }
   },
   interactivity:{
     events:{
       onHover:{ enable:true, mode:'repulse' },
       onClick:{ enable:true, mode:'push' }
     },
     modes:{
       repulse:{ distance:80 },
       push:{ quantity:4 }
     }
   }
 });

 /* ----------  GSAP Scroll animations  ---------- */
 gsap.utils.toArray('.timeline-item .glass').forEach(card=>{
   gsap.from(card,{
     y:100, opacity:0, duration:0.8,
     scrollTrigger:{ trigger:card, start:"top 80%" }
   });
 });

 /* KPI counters */
 document.querySelectorAll('.counter').forEach(el=>{
   const target=parseInt(el.dataset.target,10);
   gsap.fromTo(el, { innerText:0 }, {
     innerText:target, duration:2, ease:'power1.out',
     snap:{ innerText:1 },
     scrollTrigger:{ trigger:el, start:'top 90%' }
   });
 });

 /* Skill bars */
 document.querySelectorAll('.skill-bar').forEach(bar=>{
   const w=bar.dataset.skill+'%';
   gsap.to(bar,{
     width:w, duration:1.5,
     scrollTrigger:{ trigger:bar, start:'top 85%' }
   });
 });

 /* Awards tilt */
 VanillaTilt.init(document.querySelectorAll('.tilt'),{ max:12, glare:true, 'max-glare':.2 });

 /* Smooth scroll for nav links */
 document.querySelectorAll('#navbar a[href^="#"]').forEach(link=>{
   link.addEventListener('click',e=>{
     e.preventDefault();
     document.querySelector(link.getAttribute('href'))
       .scrollIntoView({ behavior:'smooth', block:'start' });
     if(document.getElementById('nav-menu').classList.contains('block')){
       document.getElementById('nav-menu').classList.remove('block');
     }
   });
 });

 /* Active section highlight in nav */
 const sections=gsap.utils.toArray('section');
 sections.forEach(sec=>{
   ScrollTrigger.create({
     trigger:sec,
     start:'top center',
     end:'bottom center',
     onToggle:self=>{
       document.querySelectorAll('#navbar a').forEach(a=>{
         a.classList.toggle('text-accent',
           a.getAttribute('href')===`#${sec.id}` && self.isActive);
       });
     }
   });
 });

 /* ----------  Feedback modal  ---------- */
 const modal=document.getElementById('recModal');
 document.getElementById('openRec').onclick=()=>modal.classList.add('open');
 document.getElementById('closeRec').onclick=()=>modal.classList.remove('open');
 document.getElementById('sendRec').onclick=()=>{
   const text=document.getElementById('recText').value.trim();
   if(!text) return alert('Введите текст отзыва 🙂');
   // здесь можно отправить AJAX-запрос, письмо, Google Sheets API и т.д.
   alert('Спасибо за отзыв! 🚀');
   document.getElementById('recText').value='';
   modal.classList.remove('open');
 };

});
</script>
</body>
</html>
