<x-layout>
  <x-slot:heading>
    Register
  </x-slot:heading>

  <form method="POST" action="/jobs">
    @csrf

    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">
      
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <x-form-field>
            <x-form-label for="name">Name</x-form-label>
            <div class="mt-2">
              <x-form-input name="name" id="title"/>

              <x-form-error name="name" />
            </div>
          </x-form-field>
        
        
      </div>

          <x-form-field>
            <x-form-label for="email">Email</x-form-label>
            <div class="mt-2">
              <x-form-input name="email" id="email" type="email" />

              <x-form-error name="email" />
            </div>
          </x-form-field>

        </div>

        </div>
        </div>





    <div class="mt-6 flex items-center justify-end gap-x-6">
      <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button>
      <x-form-button>Save</x-form-button>
    </div>
  </form>


</x-layout>