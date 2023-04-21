@props([
    'title',
    'options',
    'selected',
    'startIndex' => 0,
    'endIndex' => 2,
])

<div x-data="{
        open: true,
        search: '',
        startIndex: {{ $startIndex }},
        endIndex: {{ $endIndex }},
        options: @entangle($options),
        selected: @entangle($selected),
        get searchResults() {
            return this.options.filter(
                i => i.name.toLowerCase().includes(this.search.toLowerCase())
            )
        },
        get results() {
          return this.options.filter((val, index) => {
            return index >= this.startIndex && index <= this.endIndex
          })
        }
    }">
    <h3 class="mt-2 mb-1 text-xl">
        <button @click="open = !open" class="flex w-full items-center justify-between text-left">
            {{ $title }}
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 transform duration-300" :class="{'rotate-180': open}">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" />
            </svg>
        </button>
    </h3>
    <div x-show="open"
         x-transition.scale.origin.top
         x-transition:enter.duration.500ms
         x-transition:leave.duration.500ms
    >
        <input x-model="search" class="mb-2 w-full rounded-md border border-gray-400 px-2 py-1 text-sm" placeholder="Search for {{ strtolower($title) }}">
        <template x-if="search.length > 0">
            <template x-for="(option, index) in searchResults" :key="option.id">
                <div>
                    <input type="checkbox" :id="'option' + index" :value="option.id" x-model="selected">
                    <label :for="'option' + index" x-text="option.name + ' (' + option.products_count + ')'"></label>
                </div>
            </template>
        </template>
        <template x-if="search.length === 0">
            <div>
                <template x-for="(option, index) in results" :key="option.id">
                    <div>
                        <input type="checkbox" :id="'option' + index" :value="option.id" x-model="selected">
                        <label :for="'option' + index" x-text="option.name + ' (' + option.products_count + ')'"></label>
                    </div>
                </template>
                <template x-if="endIndex != options.length">
                    <div class="mt-1 cursor-pointer font-medium text-indigo-500" @click="endIndex = options.length">Show More</div>
                </template>
                <template x-if="endIndex === options.length">
                    <div class="mt-1 cursor-pointer font-medium text-indigo-500" @click="endIndex = {{ $endIndex }}">Show Less</div>
                </template>
            </div>
        </template>
    </div>
</div>