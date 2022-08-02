import React from 'react';
import YouTube from 'react-youtube';

/** To do: Play multiple videos */
const YoutubePlayer = (props) => {
    const { videos } = props;

    const opts = {
        height: '500',
        width: '100%',
        playerVars: {
            autoplay: 1,
        },
    };

    return <YouTube videoId={videos[0].key} opts={opts} onReady={ event => event.target.pauseVideo } />;
}


export default YoutubePlayer;