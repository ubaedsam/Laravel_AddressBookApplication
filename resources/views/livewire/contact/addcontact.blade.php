<div class="container h-full px-6 py-20">
  <div class="text-center">
    <h1 class="text-primary-700 mb-10 font-bold md:text-5xl sm:text-4xl">Tambah Data Contact</h1>
  </div>
  <div
    class="g-6 flex h-full flex-wrap items-center justify-center lg:justify-between">
    <div class="mb-12 md:mb-0 md:w-8/12 lg:w-6/12">
        <img
          src="/data.png"
          class="w-full" />
    </div>

    <div class="sm:w-full md:w-8/12 lg:ml-6 lg:w-5/12">
      <form method="post" wire:submit.prevent="AddContact">
        @csrf
        <div class="w-full lg:mx-auto">
          <div class="w-full px-4 mb-4">
            <label for="group" class="text-base font-bold text-blue-600/100">Group</label>
            <select name="group_id" class="w-full bg-slate-200 p-3 rounded-md" wire:model="group_id">
                <option selected>Choose Group</option>
                @foreach ($groups as $group)
                    <option value="{{ $group->id }}">{{ $group->group }}</option>
                @endforeach
            </select>
            @error('group_id')
                <p class="text-base font-bold text-red-600/100">{{ $message }}</p>
            @enderror
          </div>
          <div class="w-full px-4 mb-4">
            <label for="name" class="text-base font-bold text-blue-600/100">Name</label>
            <input type="text" id="name" name="name" class="w-full bg-slate-200 p-3 rounded-md" placeholder="Enter name" wire:model="name" />
            @error('name')
                <p class="text-base font-bold text-red-600/100">{{ $message }}</p>
            @enderror
          </div>
          <div class="w-full px-4 mb-4">
            <label for="address" class="text-base font-bold text-blue-600/100">Address</label>
            <textarea class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-slate-200 bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="address" rows="3" placeholder="Enter address" wire:model="address"></textarea>
            @error('address')
                <p class="text-base font-bold text-red-600/100">{{ $message }}</p>
            @enderror
          </div>
          <div class="w-full px-4 mb-4">
            <label for="phone" class="text-base font-bold text-blue-600/100">Phone</label>
            <input type="text" id="phone" name="phone" class="w-full bg-slate-200 p-3 rounded-md" placeholder="Enter number phone" wire:model="phone" />
            @error('phone')
                <p class="text-base font-bold text-red-600/100">{{ $message }}</p>
            @enderror
          </div>
          <div class="mb-6 flex items-center justify-between px-4">
            <button type="submit" class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Simpan</button>
            <a href="{{ route('user.contact') }}" class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Kembali</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>