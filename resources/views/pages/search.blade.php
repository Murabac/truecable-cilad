@extends('../layout/' . $layout)

@section('subhead')
    <title>Search - Truecable - Cilad</title>
@endsection

@section('subcontent')
<div class="intro-y flex items-center mt-8" >
    <h2 class="text-lg font-medium mr-auto">Quick Customer Search</h2>
</div>

<div class="intro-y py-8 mt-5">
    <div class="flex justify-center">
        <h1 class="intro-y  font-medium text-base mb-5" style="font-size: 2.0rem; text-transform: uppercase;">Quick customer check</h1>
    </div>

    {{-- <div class="flex justify-center mt-5">
        <div class="relative">
            <input type="text" class="form-control py-3 px-4 lg:w-64 box" placeholder="Search item...">
            <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0 text-slate-500" data-feather="search"></i>
        </div>
    </div> --}}
</div>


<form class="flex items-center" method="get">   
    <div class="relative w-full">
        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
        </div>
        <input type="text" name="card" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 pt-3 pb-3  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search" required="">
    </div>
    <button type="submit" class="btn btn-primary shadow-md mr-3 ml-4" name="submit">
       <p class="">Search</p>
    </button>
</form>


<div class="overflow-x-auto relative shadow-md sm:rounded-lg mt-10 ">
    <table class="w-full text-sm text-left">
        <thead class="text-xs uppercase" style="background-color: rgb(var(--color-primary) / var(--tw-bg-opacity)); color: #fff;">
            <tr>
                <th class="py-3 px-6">
                    Customer Name
                </th>
                <th class="py-3 px-6">
                    Phone
                </th>
                <th class="py-3 px-6">
                    Address
                </th>
                <th class="py-3 px-6">
                    Status
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                {{-- <th  class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline" style="color: rgb(var(--color-primary) / var(--tw-bg-opacity));">Abdirahman Mohamed</a>
                </th>
                <th class="py-4 px-6">
                    0634749276
                </th>
                <th class="py-4 px-6">
                    Xero Awr
                </th>
                <th class="py-4 px-6">
                    Active
                </th> --}}

                <?php
                    
                    if (isset($_GET['submit'])) {
                        $card = $_GET['card'];

                        $f1='http://41.79.196.246/TrueApi/api/Client?accessToken=3F97B98E4EBA9B605BF046F2089CCCTT&Cardid=';
			            $f2='&table=Caseyr';
			            $main = $f1.$card.$f2;
			            $data= @file_get_contents($main);
			            $characters = json_decode($data, true);

                        echo "
                        <th  class='py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white'>
                            <a href='#' class='font-medium text-blue-600 dark:text-blue-500 hover:underline' style='color: rgb(var(--color-primary) / var(--tw-bg-opacity));'> ". @$characters['ClientName'] ."</a>
                        </th>
                        ";

                        echo "
                        <th  class='py-4 px-6'>
                            ". @$characters['Mobile'] ."
                        </th>
                        ";

                        echo "
                        <th  class='py-4 px-6'>
                            ". @$characters['AreaName'] ."
                        </th>
                        ";

                        @$Remaining=@$characters['RemainingDays'];
			            if (@$Remaining<'0') {
			                @$status='Inactive';
			            }else{
			                 @$status='Active';
                            };

                        echo "
                        <th  class='py-4 px-6'>
                            ". @$status ."
                        </th>
                        ";
                    }
                ?>
            </tr>
        </tbody>

        <thead class="text-xs uppercase" style="background-color: rgb(var(--color-primary) / var(--tw-bg-opacity)); color: #fff;">
            <tr>
                <th class="py-3 px-6">
                    Last Payment	
                </th>
                <th class="py-3 px-6">
                    Date Opened
                </th>
                <th class="py-3 px-6">
                    Last payment date
                </th>
                <th class="py-3 px-6">
                    Days
                </th>
            </tr>
        </thead>

        <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                {{-- <th  class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline" style="color: rgb(var(--color-primary) / var(--tw-bg-opacity));">Abdirahman Mohamed</a>
                </th>
                <th class="py-4 px-6">
                    0634749276
                </th>
                <th class="py-4 px-6">
                    Xero Awr
                </th>
                <th class="py-4 px-6">
                    Active
                </th> --}}

                <?php
                    
                    if (isset($_GET['submit'])) {
                        $card = $_GET['card'];

                        $f1='http://41.79.196.246/TrueApi/api/Client?accessToken=3F97B98E4EBA9B605BF046F2089CCCTT&Cardid=';
			            $f2='&table=Caseyr';
			            $main = $f1.$card.$f2;
			            $data= @file_get_contents($main);
			            $characters = json_decode($data, true);

                        echo "
                        <th  class='py-4 px-6'>
                           $ ". @$characters['Amount'] ."
                        </th>
                        ";

                        echo "
                        <th  class='py-4 px-6'>
                            ". @$characters['RegisteredDate'] ."
                        </th>
                        ";

                        echo "
                        <th  class='py-4 px-6'>
                            ". @$characters['PayDate'] ."
                        </th>
                        ";

                        echo "
                        <th  class='py-4 px-6'>
                            ". @$characters['RemainingDays'] ."
                        </th>
                        ";
                    }
                ?>
            </tr>
        </tbody>

    </table>
</div>




@endsection
