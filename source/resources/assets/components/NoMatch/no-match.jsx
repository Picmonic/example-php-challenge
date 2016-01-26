'use strict';

import React from 'react';

class NoMatch extends React.Component {
	render() {
		return (
			<div className="not-found">
				<h1>404</h1>
				<p>The object or resoruce you have requested could not be located.</p>
			</div>
		);
	}
}

export default NoMatch;