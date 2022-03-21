<x-forms::field-wrapper
  :id="$getId()"
  :label="$getLabel()"
  :label-sr-only="$isLabelHidden()"
  :helper-text="$getHelperText()"
  :hint="$getHint()"
  :hint-icon="$getHintIcon()"
  :required="$isRequired()"
  :state-path="$getStatePath()">
  <div
    x-data="{state: $wire.entangle('{{ $getStatePath() }}')}"
    x-on:close-modal.window="if($event.detail.save == true && $event.detail.id == 'focal-point-picker-{{ $getStatePath() }}' ) { state = $event.detail.focus; }">
    @if ($getImage())
      <div class="mb-2 text-sm text-gray-600">Currently: <span class="font-medium text-gray-700" x-text="state"></span></div>
      <button
        class="inline-flex items-center space-x-1 text-sm font-medium focus:outline-none filament-tables-link text-primary-600 hover:text-primary-500"
        type="button"
        x-on:click="$dispatch('open-modal', {id: 'focal-point-picker-{{ $getStatePath() }}', currentFocus: state})">
        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" stroke="none">
          <path d="M12,11a1,1,0,1,0,1,1A1,1,0,0,0,12,11Zm0-9A10,10,0,1,0,22,12,10,10,0,0,0,12,2Zm1,17.93V17a1,1,0,0,0-2,0v2.93A8,8,0,0,1,4.07,13H7a1,1,0,0,0,0-2H4.07A8,8,0,0,1,11,4.07V7a1,1,0,0,0,2,0V4.07A8,8,0,0,1,19.93,11H17a1,1,0,0,0,0,2h2.93A8,8,0,0,1,13,19.93Z" />
        </svg>
        <span>Update focal point</span>
      </button>
    @else
      <span class="text-sm text-gray-500">You need to provide an image.</span>
    @endif
  </div>
</x-forms::field-wrapper>

<x-filament::modal
  width="7xl"
  id="focal-point-picker-{{ $getStatePath() }}"
  x-data="{leftPct:null, topPct:null}"
  x-on:open-modal.window="leftPct = $event.detail.currentFocus.split(' ')[0]; topPct = $event.detail.currentFocus.split(' ')[1]">

  <div class="flex flex-wrap sm:flex-nowrap">
    <aside class="self-start w-full p-6 bg-gray-100 rounded-lg sm:max-w-md">
      <header class="w-full">
        <h3 class="mb-4 text-xl font-bold">Focal point picker</h3>
      </header>
      <div>
        <p class="mb-4 text-sm">Click an area on the image below to set the focal point.</p>
        <div class="relative">
          {{-- Image --}}
          <img
            x-on:click="leftPct = (($event.offsetX * 100) / $event.target.clientWidth).toFixed(0) + '%'; topPct = (($event.offsetY * 100) / $event.target.clientHeight).toFixed(0) + '%';"
            class="block w-full h-auto"
            draggable="false"
            src="{{ $getImage() }}">
          {{-- Marker --}}
          <div
            class="absolute z-10 w-5 h-5 transform -translate-x-1/2 -translate-y-1/2 bg-black bg-opacity-50 border-2 border-white rounded-full pointer-events-none"
            :style="{ left: leftPct, top: topPct}"></div>
        </div>
      </div>
    </aside>
    <main class="flex flex-col flex-1 w-full mt-12 sm:pt-6 sm:mt-0 sm:pl-8">
      {{-- Preview --}}
      <header class="w-full">
        <h3 class="mb-4 text-xl font-bold">Preview</h3>
      </header>
      <div class="flex-1 grid grid-cols-3 grid-rows-3 w-full gap-6 min-h-[30rem]">
        <div class="relative col-span-2 row-span-2">
          <img
            src="{{ $getImage() }}"
            class="absolute block object-cover w-full h-full"
            :style="{ 'object-position': leftPct + ' ' + topPct}">
        </div>
        <div class="relative row-span-2">
          <img
            src="{{ $getImage() }}"
            class="absolute block object-cover w-full h-full"
            :style="{ 'object-position': leftPct + ' ' + topPct}">
        </div>
        <div class="relative col-span-3">
          <img
            src="{{ $getImage() }}"
            class="absolute block object-cover w-full h-full"
            :style="{ 'object-position': leftPct + ' ' + topPct}">
        </div>
      </div>
    </main>
  </div>

  <x-slot name="footer">
    <div class="flex justify-end space-x-2">
      <x-filament::button
        outlined
        color='secondary'
        x-on:click="$dispatch('close-modal', {id: 'focal-point-picker-{{ $getStatePath() }}'})">
        Cancel
      </x-filament::button>

      <x-filament::button
        x-on:click="$dispatch('close-modal', {id: 'focal-point-picker-{{ $getStatePath() }}', focus: leftPct + ' ' + topPct, save: true})">
        Update and close
      </x-filament::button>
    </div>
  </x-slot>
</x-filament::modal>
