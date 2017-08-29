	<div class="row">
				<div class="col-md-12">
				<!-- overflow-y:auto !important;  scroll için. -->
					<div style="display:inline-block;width:100%;overflow-y:auto">
					<ul class="timeline timeline-horizontal">
						<?php foreach($this->timeline_data as $timeline){?>
						<li class="timeline-item">
							<div class="timeline-badge <?php echo $timeline["renk"]; ?>"><i style="margin-top: 30%;" class="fa fa-<?php echo $timeline["icon"];?>"></i></div>
							<div class="timeline-panel">
								<div class="timeline-heading">
									<h4 class="timeline-title"><?php echo $timeline["olay"]; ?></h4>
										<p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> <?php echo iconv("latin5","utf-8",strftime("%d %B %Y %A",strtotime($timeline["tarih"]))); ?></small></p>
								</div>
								<!-- <div class="timeline-body">
									
								</div> -->
							</div>
						</li>
						<?php } ?>
					</ul>
				</div>
				</div>
			</div>
			</div>
</div>
</body>
</html>