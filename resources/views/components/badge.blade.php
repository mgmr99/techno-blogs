 @props(['textColor', 'bgColor'])
 @php
     $textColor = match ($textColor) {
         'gray' => 'text-gray-500',
         'blue' => 'text-blue-500',
         'red' => 'text-red-500',
         'yellow' => 'text-yellow-500',
         'white' => 'text-white-500',
     };
     $bgColor = match ($bgColor) {
         'gray' => 'bg-gray-100',
         'blue' => 'bg-blue-100',
         'red' => 'bg-red-100',
         'yellow' => 'bg-yellow-100',
         'white' => 'text-white-500',
     };
 @endphp
 <button {{ $attributes }} class="{{ $textColor }} {{ $bgColor }} rounded-xl px-3 py-1 text-base">
     {{ $slot }}</button>
