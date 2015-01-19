%% this is just a quick demo of how to efficiently run a one sample ttest
% for a set of preprocessed subjects

clear all
close all


%% mask (we consider only pixels inside the mask for multiple comparisons)
mask=double(imread('mask.png'));;
in_mask=find(mask>128); % list of pixels inside the mask


%% load all subjects
basepath=['./preprocessed/']
files=dir([basepath '*.mat']); % preprocessed files, obtained by running embody_demo.m
NS=length(files);
NC=14; % number of conditions
data=zeros(length(in_mask),NS,NC);

for s=1:NS
    load([basepath files(s).name]); % now we have variable resmat
    % reshape 3D matrix intro 2D matrix ( pixels X conditions )
    temp=reshape(resmat,[],NC);
    data(:,s,:)=temp(in_mask,:);
end

tdata=zeros(length(in_mask),NC);
for condit=1:NC
    [H,P,CI,STATS] = ttest(data(:,:,condit)');
    tdata(:,condit)=STATS.tstat;
end

%% multiple comparisons correction across all conditions
alltdata=tdata(:);
alltdata(find(~isfinite(alltdata))) = [];   % getting rid of anomalies due to low number of demo subjects (ie no variance)

df=NS-1;    % degreeso of freedom
P        = 1-cdf('T',alltdata,df);  % p values
[pID pN] = FDR(P,0.05);             % BH FDR
tID      = icdf('T',1-pID,df);      % T threshold, indep or pos. correl.
tN       = icdf('T',1-pN,df) ;      % T threshold, no correl. assumptions

% and then plot results from tdata setting the T thresholds identified.
% Enrico to add here demo T-map plot (it needs more demo subjects though to
% reach significance)


