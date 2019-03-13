<div class="modal fade" id="contestDetailsModal"
     tabindex="-1" role="dialog"
     aria-labelledby="contestDetailsModal">
  <div class="modal-dialog modal-lg" role="document">

    <div id="modal-content" class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="contestDetailsModalLabel">
          Contest Details
        </h4>

        <button type="button" class="close"
          data-dismiss="modal"
          aria-label="Close">
          <span aria-hidden="true">&times;
          </span>
        </button>
      </div>

      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12	col-xl-12">
            <div class="text-center" id="modal-contest-name">
              Contest Name
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-3 col-xl-3">
            <div class="mx-auto align-middle">
              Sponsor LOGO
            </div>
          </div>

          <div class="col-lg-9 col-xl-9">
            <div class="row">
              <div class="col-lg-12 col-xl-12">
                <table class="table">
                  <thead>
                    <tr>
                      <th class="text-center align-middle">USER ENTRY</th>
                      <th class="text-center align-middle">ENTRY</th>
                      <th class="text-center align-middle">TOTAL PRIZE</th>
                      <th class="text-center align-middle">START DATE</th>
                      <th class="text-center align-middle">START TIME</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td id="modal-user-entry" class="text-center align-middle"></td>
                      <td id="modal-total-entry" class="text-center align-middle"></td>
                      <td id="modal-total-prize" class="text-center align-middle"></td>
                      <td id="modal-start-date" class="text-center align-middle"></td>
                      <td id="modal-start-time" class="text-center align-middle"></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>


            <div class="row">
              <div class="col-lg-12 col-xl-12">
                <i class="text-center">*Registration will close 30 minutes before start of contest!</i>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12 col-xl-12">

            <div class="row">
              <div class="col-lg-12 col-xl-12 text-center">
                <h6>Draft a team consisting of 10 players from the following games:</h6>
              </div>
            </div>

            <div class="row">
              <ul class="col-lg-12 col-xl-12" id="modal-sports-events" style="list-style:none; float:left;">

              </ul>
            </div>
          </div>
        </div>

        <div class="row">

          <div class="col-lg-6 col-xl-6">
            <div class="row">

              <div class="col-lg-12 col-xl-12 text-center">
                <h6>Prize Structure</h6>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-12 col-xl-12" id="modal-prize-structure">

              </div>
            </div>
          </div>

          <div class="col-lg-6 col-xl-6">
            <div class="row">

              <div class="col-lg-12 col-xl-12 text-center">
                <h6>Scoring</h6>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-12 col-xl-12" id="pointsystem">

              </div>
            </div>
          </div>
        </div>

      </div>

      <div class="modal-footer">
        <button type="button"
           class="btn btn-default"
           data-dismiss="modal">Close</button>
        <span class="pull-right">
          <button type="button" class="btn btn-primary">
            Add to Favorites
          </button>
        </span>
      </div>
    </div>
  </div>
</div>