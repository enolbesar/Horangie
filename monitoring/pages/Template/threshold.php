<div class="col-lg-6 mb-lg-0 mb-3">
    <div class="card z-index-2 h-100">
        <div class="card-header pb-0 pt-3 bg-transparent">
            <h6 class="text-capitalize">Threshold</h6>
        </div>
        <ul class="list-group p-3 pt-0 pb-0">
            <li
                class="list-group-item border-0 d-flex justify-content-between ps-0 mb-0 border-radius-lg">
                <div class="d-flex align-items-center">
                    <div class="d-flex flex-column">
                        <h6 class="mb-1 text-dark text-sm">Irrigation Pump</h6>
                        <p id="rangeValue1" class="float-end mb-0"><span id="posIrrPump"><?php echo $irrPump_threshold ?></span></p>
                    </div>
                </div>
                <div class="d-flex col-lg-9">
                    <input type="range" class="form-range p-1 mt-3" min="0" max="100" step="1"
                        id="customRange1" value="<?php echo $irrPump_threshold ?>" onchange="thrIrrPump(this.value)">
                </div>
            </li>
            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-0 border-radius-lg">
                <div class="d-flex align-items-center">
                    <div class="d-flex flex-column">
                        <h6 class="mb-1 text-dark text-sm">Misting Pump</h6>
                        <p id="rangeValue2" class="float-end mb-0"><span id="posMistPump"><?php echo $mistPump_threshold ?></span></p>
                    </div>
                </div>
                <div class="d-flex col-lg-9">
                    <input type="range" class="form-range p-1 mt-3" min="0" max="100" step="1" id="customRange2" value="<?php echo $mistPump_threshold ?>" onchange="thrMistPump(this.value)">
                </div>
            </li>
            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-0 border-radius-lg">
                <div class="d-flex align-items-center">
                    <div class="d-flex flex-column">
                        <h6 class="mb-1 text-dark text-sm">Heater</h6>
                        <p id="rangeValue3" class="float-end mb-0"><span id="posHeater"><?php echo $heater_threshold ?></span></p>
                    </div>
                </div>
                <div class="d-flex col-lg-9">
                    <input type="range" class="form-range p-1 mt-3" min="0" max="100" step="1" id="customRange3" value="<?php echo $heater_threshold ?>" onchange="thrHeater(this.value)">
                </div>
            </li>
            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-0 border-radius-lg">
                <div class="d-flex align-items-center">
                    <div class="d-flex flex-column">
                        <h6 class="mb-1 text-dark text-sm">Lamp</h6>
                        <p id="rangeValue4" class="float-end mb-0"><span id="posLamp"><?php echo $lamp_threshold ?></span></p>
                    </div>
                </div>
                <div class="d-flex col-lg-9">
                    <input type="range" class="form-range p-1 mt-3" min="0" max="100" step="1" id="customRange4" value="<?php echo $lamp_threshold ?>" onchange="thrLamp(this.value)">
                </div>
            </li>
        </ul>
    </div>
</div>