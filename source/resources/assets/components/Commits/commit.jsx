'use strict';

import React from 'react';

class Commit extends React.Component {
	render() {
		var className = 'list-group-item commit' + (isNaN(this.props.sha.substr(-1)) ? '' : ' colored');
		return (
			<a href={this.props.url} target="_blank" className={className}>
				<div className="row">
					<div className="col-xs-5">
						<span className="label label-default label-xs">{this.props.sha}</span> 
					</div>
					<div className="col-xs-7">
						Committed by <strong>{this.props.committer}</strong>,
						Authored by <strong>{this.props.author}</strong>
					</div>
				</div>
			</a>
		);
	}
}

export default Commit;