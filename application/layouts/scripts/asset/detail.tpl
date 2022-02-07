<section>
    <header class="panel-heading">
        <div class="col-sm-12">
            Chi tiết tài sản
        </div>
    </header>
    <div class="table-agile-info">
        <div class="row">
            <div class="col-sm-4 gallery-grids-left">
                <div class="gallery-grid">
                    <img src="/images/asset_images/{$asset.image}" alt="" />
                </div>
            </div>
            <div class="col-sm-1"></div>
            <div class="col-sm-7 stats-info margin-box" >
                <div class="stats-info-agileits">
                    <div>
                        <ul class="list-unstyled">
                            <li>
                                <div class="form-group has-success">
                                    <label class="col-lg-5 control-label">Tên tài sản</label>
                                    <div class="col-lg-7 input-summary-info">
                                        <div class="form-control">{$asset.name}</div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form-group has-success">
                                    <label class="col-lg-5 control-label">Mã tài sản</label>
                                    <div class="col-lg-7 input-summary-info">
                                        <div class="form-control">{$asset.code}</div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form-group has-success">
                                    <label class="col-lg-5 control-label">Nhóm tài sản</label>
                                    <div class="col-lg-7 input-summary-info">
                                        <div class="form-control">{$asset.group_name}</div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form-group has-success">
                                    <label class="col-lg-5 control-label">Cấu hình</label>
                                    <div class="col-lg-7 input-summary-info">
                                        <div class="form-control">{$asset.configuration}</div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form-group has-success">
                                    <label class="col-lg-5 control-label">Tình trạng</label>
                                    <div class="col-lg-7 input-summary-info">
                                        <div class="form-control">{$asset.status_name}</div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form-group has-success">
                                    <label class="col-lg-5 control-label">Trạng thái</label>
                                    <div class="col-lg-7 input-summary-info">
                                        <div class="form-control">{$asset.state_name}</div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
