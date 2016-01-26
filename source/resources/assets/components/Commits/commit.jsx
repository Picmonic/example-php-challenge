'use strict';

import React from 'react';

class Commit extends React.Component {
	render() {
		var className = 'list-group-item commit' + (isNaN(this.props.sha.substr(-1)) ? '' : ' colored');
		return (
			<div className={className}>
				{this.props.sha} : <strong>{this.props.author.login}</strong>
			</div>
		);
	}
}

export default Commit;