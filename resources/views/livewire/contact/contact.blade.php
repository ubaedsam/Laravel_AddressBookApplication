<div class="container mx-auto py-10">
  <div class="text-center">
    <h1 class="text-primary-700 sm:mb-3 font-bold md:text-4xl lg:text-5xl sm:text-5xl">Manage Contacts</h1>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="g-6 flex h-full items-center justify-center">
        <div class="mb-8 md:mb-0 md:w-8/12 sm:w-full lg:w-6/12">
            <img
              src="/contact.png"
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
        <div class="mt-4 flex flex-wrap items-center justify-between">
          <select wire:model="perPage" class="lg:w-[100px] md:w-[100px] sm:w-1/3 p-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="5">5 Data</option>
            <option value="15">15 Data</option>
            <option value="25">25 Data</option>
          </select>
          <select wire:model="group" class="lg:w-[300px] md:w-[600px] sm:w-[400px] p-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="">Choose Group</option>
            @foreach ($groups as $group)
              <option value="{{ $group->id }}">{{ $group->group }}</option>
            @endforeach
          </select>
          <form class="lg:w-[500px] md:w-full sm:w-full">   
            <label for="default-search" class="text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                <input wire:model="search" type="search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter Keyword">
                <a href="{{ route('user.all-contact.add') }}" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tambah Data</a>
            </div>
          </form>
        </div>
      <div class="pt-5">
        <table class="border-separate border">
            <thead>
              <tr>
                <th class="border p-5">No</th>
                <th class="border p-5">Group Name</th>
                <th class="border p-5">Name</th>
                <th class="border p-5">Address</th>
                <th class="border p-5">Phone</th>
                <th class="border p-5">Action</th>
              </tr>
            </thead>
            <tbody id="tbody">
              @if (count($contacts) > 0)
                @foreach ($contacts as $contact)
                <tr>
                  <td class="border text-center p-2">{{ $loop->iteration }}</td>
                  <td class="border text-center p-2">{{ $contact->group->group }}</td>
                  <td class="border text-center p-2">{{ $contact->name }}</td>
                  <td class="border text-center p-2">{{ $contact->address }}</td>
                  <td class="border text-center p-2">{{ $contact->phone }}</td>
                  <td class="border text-center p-2">
                    <div class="flex item-center justify-center">
                      <div class="w-4 mr-2 transform hover:text-orange-500 hover:scale-110">
                        <a href="{{ route('user.all-contact.edit',['contact_id'=>$contact->id]) }}">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                          </svg>
                        </a>
                      </div>
                      <div class="w-4 mr-2 transform hover:text-red-500 hover:scale-110">
                        <a href="#" onclick="confirm('Apakah anda yakin ingin menghapus data contact ini ?') || event.stopImmediatePropagation()" wire:click.prevent="hapusContact({{ $contact->id }})">
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
                  <td colspan="6">
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
        {{ $contacts->links() }}
      </div>
    </div>
  </div>
</div>

  <script>
    $(document).ready(function(){
      $("#group").on('change',function(){
        var group = $(this).val();
        $.ajax({
          url:"{{ route('user.contact') }}",
          type:"GET",
          data:{'group':group},
          success:function(data){
            var contacts = data.contacts;
            var html = '';
            if (contacts.length > 0){
              for(let i = 0; i<contacts.length;i++){
                html += '<tr>\
                  <td>'+(i+1)+'</td>\
                  <td>'+contacts+group[i]['group']+'</td>\
                  <td>'+contacts[i]['name']+'</td>\
                  <td>'+contacts[i]['address']+'</td>\
                  <td>'+contacts[i]['phone']+'</td>\
                  </tr>';
              }
            }else{
              html += '<tr>\
                <td>Data Tidak Ditemukan</td>\
                </tr>';
            }

            $("#tbody").html(html);
          }
        });
      });
    });
  </script>