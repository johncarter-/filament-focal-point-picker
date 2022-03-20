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
      {{-- <div class="text-sm text-gray-600 mb-2">Currently: <span class="text-gray-700 font-medium" x-text="state"></span></div> --}}
      <button
        class="focus:outline-none filament-tables-link text-primary-600 hover:text-primary-500 text-sm font-medium inline-flex space-x-1 items-center"
        type="button"
        x-on:click="$dispatch('open-modal', {id: 'focal-point-picker-{{ $getStatePath() }}', fieldId: '{{ $getStatePath() }}', currentFocus: state})">
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
    <aside class="w-full sm:max-w-md bg-gray-100 self-start rounded-lg p-6">
      <header class="w-full">
        <h3 class="text-xl font-bold mb-4">Focal point picker</h3>
      </header>
      <div>
        <p class="text-sm mb-4">Click an area on the image below to set the focal point.</p>
        <div class="relative">
          {{-- Image --}}
          <img
            x-on:click="leftPct = (($event.offsetX * 100) / $event.target.clientWidth).toFixed(0) + '%'; topPct = (($event.offsetY * 100) / $event.target.clientHeight).toFixed(0) + '%';"
            class="block w-full h-auto"
            draggable="false"
            src="{{ $getImage() }}">
          {{-- Marker --}}
          <div
            class="absolute z-10 transform -translate-x-1/2 -translate-y-1/2 w-5 h-5 rounded-full bg-black border-2 border-white bg-opacity-50 pointer-events-none"
            :style="{ left: leftPct, top: topPct}"></div>
        </div>
      </div>
    </aside>
    <main class="w-full sm:pt-6 mt-12 sm:mt-0 sm:pl-8 flex-1 flex flex-col">
      {{-- Preview --}}
      <header class="w-full">
        <h3 class="text-xl font-bold mb-4">Preview</h3>
      </header>
      <div class="flex-1 grid grid-cols-3 grid-rows-3 w-full gap-6 min-h-[30rem]">
        <div class="relative col-span-2 row-span-2">
          <img
            src="{{ $getImage() }}"
            class="absolute block object-cover h-full w-full"
            :style="{ 'object-position': leftPct + ' ' + topPct}">
        </div>
        <div class="relative row-span-2">
          <img
            src="{{ $getImage() }}"
            class="absolute block object-cover h-full w-full"
            :style="{ 'object-position': leftPct + ' ' + topPct}">
        </div>
        <div class="relative col-span-3">
          <img
            src="{{ $getImage() }}"
            class="absolute block object-cover h-full w-full"
            :style="{ 'object-position': leftPct + ' ' + topPct}">
        </div>
      </div>
    </main>
  </div>

  <x-slot name="footer">
    <div class="flex space-x-2 justify-end">
      <x-filament::button
        outlined
        color='secondary'
        x-on:click="$dispatch('close-modal', {id: 'focal-point-picker-{{ $getStatePath() }}', fieldId: '{{ $getStatePath() }}'})">
        Cancel
      </x-filament::button>

      <x-filament::button
        x-on:click="$dispatch('close-modal', {id: 'focal-point-picker-{{ $getStatePath() }}', fieldId: '{{ $getStatePath() }}', focus: leftPct + ' ' + topPct, save: true})">
        Update and close
      </x-filament::button>
    </div>
  </x-slot>
</x-filament::modal>
