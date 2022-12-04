<x-proyectos-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex p-2">
                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js" integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> <div class="py-12">   
                <div >
                Nombre><h1>{{$backlog->descripcion}}</h1> <br>
                <canvas id="myChart" width="600" height="600"></canvas>
            </div>
                </div>
              
                <!-- scrip necesario para generar la grafica correspondiente. -->
         
            </div>
                                        <?php   
                                        $a = 0;
                                        $b = 0;
                                        $c = 0;?>
             
            <!-- Traemos los datos de la BD para usarlo en la grafica  -->
            <?php $user = auth()->user();?>
                   @foreach ($user->proyectos as $proyecto)
                        @foreach ($backlog->sprint as $sprint)                      
                            @foreach ($sprint->user_story as $user_story)
                            
                            
                                    
                                        @if ($user_story -> estado === 'TO DO')
                                        
                                        <?php $a=$a+1;
                                        ?>
                                          
                                        @elseif ($user_story -> estado === 'DOING')
                                        
                                        <?php $b=$b+1;
                                        
                                        ?>
                                        
                                        
                                        @elseif ($user_story -> estado === 'DONE')
                                        
                                        <?php $c++; 
                                        ?>
                                        @endif
                            @endforeach
                           
                        @endforeach
                    <br>
                    @endforeach
            
            <!-- Archivo canvas para minimizar la grafica que no funka -->

            <script>
                    
                    const ctx = document.getElementById('myChart').getContext('2d');
                        const myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                    labels: ['Pendiente', 'En proceso', 'Finalizado'],
                    datasets: [{
                    label: 'LOS PROYECTOS',
                    data: [{{$a}}, {{$b}}, {{$c}}],
                    backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',

                    ],
                    borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                    }]
                    },

                    });
             </script>        
                        
        </div>
    </div>
</x-proyectos-layout>