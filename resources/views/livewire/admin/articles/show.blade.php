@section('page_title', $article->title)

<div>
    <x-admin.page-layout :title="$article->title">
		<x-slot name="header_element">
			<button type="button" wire:click="publishArticle" class="flex items-center font-medium text-2xl text-gray-500 hover:text-amber transition-colors duration-100">
				<svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
				</svg>

				{{ __('Publish') }}
			</button>
		</x-slot>

		{{-- Edit Article --}}
		<div>
			<form 
				x-show="showForm"
				wire:submit.prevent="updateArticle" 
				wire:loading.class="opacity-50" 
				class="transition" 
			>
				@csrf

				{{-- Title --}}
				<div class="w-full md:w-2/4 mb-5 flex flex-col space-y-3">
					<label for="title" class="text-amber text-lg">
						{{ __('Title') }}
					</label>

					<input type="text" wire:model.defer="title" class="bg-gray-800 text-gray-100 rounded border border-gray-600 focus:border-gray-400 focus:ring-0" placeholder="{{ __('Title of an article') }}">

					@error ('title')
						<x-global.validation-error>
							{{ $message }}
						</x-global.validation-error>
					@enderror 
				</div>

				{{-- Body --}}
				<div class="w-full md:w-2/4 mb-5 flex flex-col space-y-3">
					<label for="body" class="text-amber text-lg">
						{{ __('Article') }}
					</label>

					<textarea id="body" wire:model.defer="body" class="w-full resize-none bg-gray-800 text-gray-100 rounded border border-gray-600 focus:border-gray-400 focus:ring-0" rows="10"></textarea>

					@error ('body')
						<x-global.validation-error>
							{{ $message }}
						</x-global.validation-error>
					@enderror 
				</div>

				{{-- Images cta --}}
				<div class="w-full md:w-2/4 mb-5 flex flex-col space-y-3" x-data>
					<button type="button" x-on:click="$refs.imagesInput.click()" class="py-2 px-4 bg-amber hover:bg-amber-darker text-gray-800 rounded-sm font-medium transition-colors">
						{{ __('Upload images') }}
					</button>

					<input type="file" wire:model="images" multiple x-ref="imagesInput" class="hidden">

					@error ('images.*')
						<x-global.validation-error>
							{{ $message }}
						</x-global.validation-error>
					@enderror 
					@error ('images')
						<x-global.validation-error>
							{{ $message }}
						</x-global.validation-error>
					@enderror 
				</div>

				{{-- Show Current Images --}}
				@if ($current_images->count())
					<div class="w-full mb-5 py-5 border-t border-b border-gray-600 | grid gap-5 md:gap-2 grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">
						@foreach($current_images as $image)
							<div wire:key="{{ $loop->index }}" class="w-full h-full flex flex-col">
								<img class="w-full h-full object-center object-cover rounded-sm" src="{{ asset('storage/images/articles').'/'.$article->id.'/'.$image->url }}">
								
								<div class="flex items-center justify-end p-3 bg-dark-secondary">
									<button type="button" wire:click="deleteImage({{ $image }})" class="text-red-400 hover:text-red-300 underline">
										{{ __('Delete Image') }}
									</button>
								</div>
							</div>
						@endforeach
					</div>
				@endif

				{{-- Show New Uploaded (temporary) Images --}}
				@if ($images)
					<div class="w-full mb-5 py-5 border-t border-b border-gray-600 | grid gap-5 md:gap-2 grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">
						@foreach($images as $image)
							<div wire:key="{{ $loop->index }}" class="w-full h-full flex flex-col">
								<img class="w-full h-full object-center object-cover rounded-sm" src="{{ $image->temporaryUrl() }}">
								
								<div class="flex items-center justify-end p-3 bg-dark-secondary">
									<button type="button" wire:click="cancelImage({{ $loop->index }})" class="text-red-400 hover:text-red-300 underline">
										{{ __('Cancel Image') }}
									</button>
								</div>
							</div>
						@endforeach
					</div>
				@endif

				{{-- Submit --}}
				<button type="submit" class="py-2 px-4 text-white bg-green-600 hover:bg-green-500 rounded shadow transition-colors">
					{{ __('Save changes') }}
				</button>
			</form>
		</div>
	</x-admin.page-layout>
</div>
