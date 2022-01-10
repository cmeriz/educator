<div class="z-40">
    <x-jet-dialog-modal wire:model="open">

        <x-slot name="title">
            <h3 class="text-secondary-500">Actualizar curso</h3>
        </x-slot>

        <x-slot name="content">

            <x-jet-label value="Datos generales" class="font-bold mb-4 uppercase"/>

            <div class="mb-4 text-secondary-500">
                <x-jet-label value="Nombre:"/>
                <input id="edit-input-name" wire:model="name" type="text" placeholder="Nombre del curso"  class="border-secondary-100 text-secondary-500 focus:border-secondary-100 bg-secondary-50 placeholder:text-secondary-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-lg w-full"/>
                <x-jet-input-error for="name" />
            </div>

            <div class="flex flex-col mb-4 text-secondary-500">
                <x-jet-label value="Color del Curso:"/>

                <div class="flex items-center gap-6">
                    <select wire:model="color" class="flex-1 border-secondary-100 {{ $color ? 'text-secondary-500' : 'text-secondary-300' }} focus:border-secondary-100 bg-secondary-50 placeholder:text-secondary-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-lg">
                        <option value="primary" class="text-secondary-500">Verde</option>
                        <option value="secondary" class="text-secondary-500">Negro</option>
                        <option value="red" class="text-secondary-500">Rojo</option>
                        <option value="orange" class="text-secondary-500">Naranja</option>
                        <option value="blue" class="text-secondary-500">Azul</option>
                        <option value="purple" class="text-secondary-500">Morado</option>
                        <option value="pink" class="text-secondary-500">Rosado</option>
                    </select>
                    <span class="block w-8 h-8 rounded-sm sample-{{$color}}--200"></span>
                </div>                

                <x-jet-input-error for="color" />

            </div>

            <div class="flex flex-col mb-8">
                <x-jet-label value="Pensum del Curso:"/>
                
                <select wire:model="pensum_id" class="border-secondary-100 {{ $pensum_id ? 'text-secondary-500' : 'text-secondary-300' }} focus:border-secondary-100 bg-secondary-50 placeholder:text-secondary-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-lg">
                    <option value="">Ninguno</option>
                    @foreach ($pensums as $pensum)
                        <option value="{{ $pensum->id }}" class="text-secondary-500">{{ $pensum->name }}</option>
                    @endforeach
                </select>

                <x-jet-input-error for="pensum_id" />
            </div>

            <x-jet-label value="Funcionamiento" class="font-bold mb-4 uppercase"/>

            <div class="grid grid-cols-3 gap-4">

                <div>
                    <x-jet-label value="Deberes:"/>
                    <div class="flex items-center gap-2">
                        <input wire:model="homeworks_weight" type="number" min="0" max="100" step="10" placeholder="Porcentaje" class="border-secondary-100 text-secondary-500 focus:border-secondary-100 bg-secondary-50 placeholder:text-secondary-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-lg w-full"/>
                        <span>%</span>
                    </div>
                    
                    <x-jet-input-error for="homeworks_weight" />
                </div>

                <div>
                    <x-jet-label value="Lecciones:"/>
                    <div class="flex items-center gap-2">
                        <input wire:model="lessons_weight" type="number" min="0" max="100" step="10" placeholder="Porcentaje" class="border-secondary-100 text-secondary-500 focus:border-secondary-100 bg-secondary-50 placeholder:text-secondary-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-lg w-full"/>
                        <span>%</span>
                    </div>
                    
                    <x-jet-input-error for="lessons_weight" />
                </div>

                <div>
                    <x-jet-label value="Exámenes:"/>
                    <div class="flex items-center gap-2">
                        <input wire:model="exams_weight" type="number" min="0" max="100" step="10" placeholder="Porcentaje" class="border-secondary-100 text-secondary-500 focus:border-secondary-100 bg-secondary-50 placeholder:text-secondary-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-lg w-full"/>
                        <span>%</span>
                    </div>
                    
                    <x-jet-input-error for="exams_weight" />
                </div>

                <x-jet-input-error for="weightings" class="col-span-3"/>

                <div>
                    <x-jet-label value="Calificación para aprobar:"/>
                    <div class="flex items-center gap-2">
                        <input wire:model="min_grade" type="number" min="0" max="10" placeholder="Porcentaje" class="border-secondary-100 text-secondary-500 focus:border-secondary-100 bg-secondary-50 placeholder:text-secondary-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-lg w-full"/>
                        <span>pts.</span>
                    </div>
                    <x-jet-input-error for="min_grade" />
                </div>
                
                <div>
                    <x-jet-label value="Asistencia para aprobar:"/>
                    <div class="flex items-center gap-2">
                        <input wire:model="min_attendance" type="number" min="0" max="100" step="10" placeholder="Porcentaje" class="border-secondary-100 text-secondary-500 focus:border-secondary-100 bg-secondary-50 placeholder:text-secondary-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-lg w-full"/>
                        <span>%</span>
                    </div>
                    <x-jet-input-error for="min_attendance" />                       
                </div>

            </div>

        </x-slot>

        <x-slot name="footer">
            <div class="flex justify-end gap-4">
                <x-button tag="button" class="btn--primary-outlined" wire:click="$set('open', false)">
                    Cancelar
                </x-button>
                <x-button id="submit-button" tag="button" class="btn--primary order-first xs:order-none" wire:click="update" >
                    Actualizar curso
                </x-button>
            </div>
        </x-slot>

    </x-jet-dialog-modal>

</div>
