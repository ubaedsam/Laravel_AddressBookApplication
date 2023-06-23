<div class="container mx-auto py-10">
      <div class="text-center">
        <h1 class="text-primary-700 sm:mb-3 font-bold md:text-4xl lg:text-5xl sm:text-5xl">Manage Groups</h1>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="g-6 flex h-full items-center justify-center">
            <div class="mb-8 md:mb-0 md:w-8/12 sm:w-full lg:w-6/12">
                <img
                  src="/group.png"
                  class="lg:w-[700px] sm:w-[800px]" />
            </div>
          </div>
        </div>
        <div class="col-md-12 sm:p-2">
          @if (Session::get('success'))
                    <div role="alert" style="margin-bottom: 15px;">
                      <div class="bg-green-500 text-white font-bold rounded-t px-4 py-2">
                        Success
                      </div>
                      <div class="border border-t-0 border-green-400 rounded-b bg-green-100 px-4 py-3 text-green-700">
                        {{ Session::get('success') }}
                      </div>
                    </div>
                    @endif
          <form>   
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                <input wire:model="search" type="search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Group Name">
                <a href="{{ route('user.all-group.add') }}" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tambah Data</a>
            </div>
          </form>
          <div class="pt-5">
            <table class="min-w-full border border-blue text-center text-sm font-light dark:border-neutral-500">
                <thead class="border-b font-medium dark:border-neutral-500">
                  <tr>
                    <th
                      scope="col"
                      class="border-r px-6 py-4 dark:border-neutral-500">
                      No
                    </th>
                    <th
                      scope="col"
                      class="border-r px-6 py-4 dark:border-neutral-500">
                      Group Name
                    </th>
                    <th scope="col" class="px-6 py-4">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @if (count($groups) > 0)
                  @foreach ($groups as $index => $group)
                  <tr class="border-b dark:border-neutral-500">
                    <td class="whitespace-nowrap border-r px-6 py-4 font-medium dark:border-neutral-500">
                      {{ $groups->firstItem() + $index }}
                    </td>
                    <td class="whitespace-nowrap border-r px-6 py-4 font-medium dark:border-neutral-500">
                      {{ $group->group }}
                    </td>
                    <td class="whitespace-nowrap px-6 py-4">
                      <div class="flex item-center justify-center">
                        <div class="w-4 mr-2 transform hover:text-orange-500 hover:scale-110">
                          <a href="{{ route('user.all-group.edit',['group_id'=>$group->id]) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                            </svg>
                          </a>
                        </div>
                        <div class="w-4 mr-2 transform hover:text-red-500 hover:scale-110">
                          <a href="#" onclick="confirm('Apakah anda yakin ingin menghapus data group ini ?') || event.stopImmediatePropagation()" wire:click.prevent="hapusGroup({{ $group->id }})">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                          </a>
                        </div>
                    </div>
                    </td>
                  </tr>
                  @endforeach
                  @else
                    <tr>
                      <td colspan="3">
                        <div class="py-7 px-6 dark:bg-neutral-900">
                          <div class="col-md-12 flex justify-center">
                            <img src="/found.png" class="lg:w-[400px] sm:w-[400px] md:w-[300px] flex justify-center mb-2">
                          </div>
                          <div class="col-md-12 text-center">
                            <h1 class="mt-2 text-5xl font-bold tracking-tight md:text-4xl xl:text-4xl">
                                Data Not Found
                            </h1>
                          </div>
                        </div>
                      </td>
                    </tr>
                  @endif
                </tbody>
            </table>
            {{ $groups->links() }}
          </div>
        </div>
      </div>
</div>