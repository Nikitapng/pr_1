<svg {{ $attributes->merge(['class' => 'h-9 w-auto', 'viewBox' => '0 0 48 48', 'fill' => 'none', 'xmlns' => 'http://www.w3.org/2000/svg']) }}>
     <!-- Чистая векторная тень 2dp (не пикселит) -->
    <rect x="5" y="9" width="32" height="34" rx="4" fill="#000000" fill-opacity="0.3"/>
    
    <!-- Нижний лист бумаги: Material Grey 700 -->
    <rect x="5" y="8" width="32" height="34" rx="4" fill="#616161"/>
    <!-- Тень верхнего листа (Ambient shadow 4dp) -->
    <rect x="11" y="4" width="32" height="36" rx="4" fill="#000000" fill-opacity="0.35"/>
    <!-- Верхний лист бумаги: Material Grey 900 -->
    <path d="M11 6C11 3.8 12.8 2 15 2H33L43 12V36C43 38.2 41.2 40 39 40H15C12.8 40 11 38.2 11 36V6Z" fill="#212121"/>
    
    <!-- Жесткая падающая тень под фальцем 45° -->
    <path d="M33 12L43 22V12H33Z" fill="#000000" fill-opacity="0.5"/>
    <!-- Фальц 45° -->
    <path d="M33 2V12H43L33 2Z" fill="#424242"/>
    <!-- Гистограмма отчетов -->
    <rect x="18" y="24" width="4" height="10" fill="#9E9E9E"/>
    <rect x="25" y="18" width="4" height="16" fill="#E0E0E0"/>
    <rect x="32" y="13" width="4" height="21" fill="#FFFFFF"/>
</svg>